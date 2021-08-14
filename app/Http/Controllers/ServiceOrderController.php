<?php

namespace App\Http\Controllers;

use App\Exports\ServiceOrderExport;
use App\Http\Requests\CreateServiceOrderRequest;
use App\Http\Requests\UpdateServiceOrderRequest;
use App\Models\ListOrder;
use App\Models\ListOrderAffari;
use App\Models\ListServiceOrder;
use App\Models\ListServiceOrderAffari;
use App\Models\Produk;
use App\Models\SalesOrder;
use App\Models\SalesOrderAffari;
use App\Models\Service;
use App\Models\ServiceOrder;
use App\Models\ServiceOrderAffari;
use App\Models\ServiceOrderAffariStatus;
use App\Repositories\ServiceOrderRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Response;
use Webpatser\Uuid\Uuid;

use Dompdf\Dompdf;
use PDF;

class ServiceOrderController extends AppBaseController
{
    /** @var  ServiceOrderRepository */
    private $serviceOrderRepository;
    // Data server
    private string $server = '192.168.1.172\SQL2008';
    private string $database = 'JRM';
    private string $username = 'sa';
    private string $password = 'MasteR99';
    private array $auth = array('Master', 'Dev', 'Admin');

    public $listorderAffari;
    public $listorder;
    public $listjasa;

    public function __construct(ServiceOrderRepository $serviceOrderRepo)
    {
        $this->serviceOrderRepository = $serviceOrderRepo;
    }

    public function index(Request $request)
    {
        $serviceOrders = $this->serviceOrderRepository->all();

        return view('service_orders.index')
            ->with('serviceOrders', $serviceOrders);
    }

    public function index_affari(Request $request)
    {
        $this->fetchServiceOrderAffari();
        $serviceOrderAffari = ServiceOrderAffari::all();
        $serviceOrderAffariStatus = ServiceOrderAffariStatus::all();


        return view('service_orders.index_affari')
            ->with('serviceOrders', $serviceOrderAffari)
            ->with('serviceOrdersStatus', $serviceOrderAffariStatus);
    }

    public function create()
    {
        $uid = substr(Uuid::generate(4),24);
//        $produks = Produk::all();
//        $services = Service::all();

        return view('service_orders.create')/*->with('services', $services)*/->with('uid', $uid);
    }

    public function load_produk()
    {
            return datatables()->of(Produk::select('*'))
                ->addColumn('produk', 'service_orders.columns.produk')
                ->addColumn('qtystok', 'service_orders.columns.stok')
                ->rawColumns(['produk','qtystok'])
                ->make(true);
    }

    public function load_service()
    {
            return datatables()->of(Service::select('*'))
                ->addColumn('service', 'service_orders.columns.service')
                ->rawColumns(['service'])
                ->make(true);
    }

    public function store(Request $request)
    {
        $outlet = $request->outlet;
        $nourutLatest = DB::table('service_orders')->where('outlet','=',$outlet) ->latest('nourut')->value('nourut');
        $nourut = $nourutLatest+1;
        $addzero = sprintf("%03d", $nourut);
        $tanggal = $request->tanggal; //01-12-2021
        $bulan = substr($tanggal, 3, 2);
        $tahun = substr($tanggal, 6, 4);
        $no_penawaran = $addzero."/BKL-JRM/".$outlet."/".$bulan."/".$tahun;

        $input = [
            'uid' => $request->uid,
            'nourut' => $nourut,
            'nama' => $request->nama,
            'tanggal' => $tanggal,
            'operator' => $request->operator,
            'mobil' => $request->mobil,
            'status' => $request->status,
            'nopol' => $request->nopol,
            'outlet' => $outlet,
            'no_penawaran' => $no_penawaran,
            'ppn' => $request->ppn,
            'tanpabongkar' => $request->tanpabongkar
        ];
        $serviceOrder = $this->serviceOrderRepository->create($input);
        Flash::success('Service Order saved successfully.');
        $id = ServiceOrder::firstWhere('uid', $request->uid);

        return $id;
    }

    /**
     * Display the specified ServiceOrder.
     *
     * @param int $id
     */
    public function show($id)
    {
        $serviceOrder = $this->serviceOrderRepository->find($id);
        $uid = $serviceOrder->uid;
        $listall = ListServiceOrder::all()->Where('uid', $uid);
        $listorder = ListServiceOrder::orderBy('nourut', 'ASC')->Where('uid', $uid)->Where('type', 'part')->get();
        $listjasa = ListServiceOrder::orderBy('nourut', 'ASC')->Where('uid', $uid)->Where('type', 'service')->get();
        $totaldiscount = $listall->sum('discount');
        $totalproduk = $listorder->sum('subtotal');
        $totaljasa = $listjasa->sum('subtotal');
        $grandtotal = $totalproduk+$totaljasa;
        $produks = Produk::all();
        $services = Service::all();

        if (empty($serviceOrder)) {
            Flash::error('Service Order not found');

            return redirect(route('serviceOrders.index'));
        }

        return view('service_orders.show')
            ->with('serviceOrder', $serviceOrder)
            ->with('listorder', $listorder)
            ->with('listjasa', $listjasa)
            ->with('totaljasa', $totaljasa)
            ->with('totaldiscount', $totaldiscount)
            ->with('totalproduk', $totalproduk)
            ->with('grandtotal', $grandtotal)
            ->with('services', $services)
            ->with('produks', $produks);
    }

    /**
     * Show the form for editing the specified ServiceOrder.
     *
     * @param int $id
     */
    public function edit($id)
    {
        $serviceOrder = $this->serviceOrderRepository->find($id);
        $uid = $serviceOrder->uid;

        $listproduk = ListServiceOrder::orderBy('nourut', 'ASC')->Where('uid', $uid)->Where('type', 'part')->get();
        $listjasa = ListServiceOrder::orderBy('nourut', 'ASC')->Where('uid', $uid)->Where('type', 'service')->get();
        $produks = Produk::all();
        $services = Service::all();

        if (empty($serviceOrder)) {
            Flash::error('Service Order not found');

            return redirect(route('serviceOrders.index'));
        }

        return view('service_orders.edit')
            ->with('serviceOrder', $serviceOrder)
            ->with('produks', $produks)
            ->with('services', $services)
            ->with('listorder', $listproduk)
            ->with('listjasa', $listjasa);
    }

    public function update($id, Request $request)
    {
        $serviceOrder = $this->serviceOrderRepository->find($id);
        $outlet = $request->outlet;
        $outletbefore = $serviceOrder->outlet;
        $nourutLatest = DB::table('service_orders')->where('outlet','=',$outlet)->latest('nourut')->value('nourut');
        if($outlet == $outletbefore){
            $nourut = $serviceOrder->nourut;
        } else {
            $nourut = $nourutLatest+1;
        }
        $addzero = sprintf("%03d", $nourut);
        $tanggal = $request->tanggal; //01-12-2021
        $bulan = substr($tanggal, 3, 2);
        $tahun = substr($tanggal, 6, 4);
        $no_penawaran = $addzero."/BKL-JRM/".$outlet."/".$bulan."/".$tahun;
        $jumlah_update = $serviceOrder->times_updated+1;

        $input = [
            'uid' => $request->uid,
            'nourut' => $nourut,
            'nama' => $request->nama,
            'tanggal' => $tanggal,
            'operator' => $request->operator,
            'mobil' => $request->mobil,
            'status' => $request->status,
            'nopol' => $request->nopol,
            'outlet' => $outlet,
            'tanpabongkar' => $request->tanpabongkar,
            'ppn' => $request->ppn,
            'no_penawaran' => $no_penawaran,
            'updated_at' => now(),
            'updated_by' => Auth::user()->name,
            'times_updated' => $jumlah_update
        ];

        if (empty($serviceOrder)) {
            Flash::error('Service Order not found');

            return redirect(route('serviceOrders.index'));
        }

        $serviceOrder = $this->serviceOrderRepository->update($input, $id);

        Flash::success('Service Order updated successfully.');
        $id = ServiceOrder::firstWhere('uid', $request->uid);

        return $id;
    }

    public function updateDataS(Request $request){
        $barcode = $request->barcode;
        $produk = Produk::where('barcode', $barcode)->first();
        if ($produk == ''){
            $produk = Service::where('barcode', $barcode)->first();
        }
        $id = $request->id;

        ListServiceOrder::updateOrCreate(['id' => $id],
            [
                'uid' => $request->uid,
                'nourut' => $request->nourut,
                'type' => $request->type,
                'barcode' => $barcode,
                'ketnama' => $request->ketnama,
                'keterangan' => $request->keterangan,
                'harga' => $request->harga,
                'qty' => $request->qty,
                'subtotal' => $request->subtotal,
                'discount' => floatval($request->discount),
            ]);
        return false;
    }

    /**
     * Remove the specified ServiceOrder from storage.
     *
     * @param int $id
     *
     * @throws Exception
     */

    public function destroy($id)
    {
        $serviceOrder = $this->serviceOrderRepository->find($id);
        $uid = $serviceOrder->uid;
        $listServiceOrder = ListServiceOrder::where('uid', $uid);


        if (empty($serviceOrder)) {
            Flash::error('Service Order not found');

            return redirect(route('serviceOrders.index'));
        }

        $this->serviceOrderRepository->delete($id);
        $listServiceOrder->delete();

        Flash::success('Service Order deleted successfully.');

        return redirect(route('serviceOrders.index'));
    }

    public function putItemS(Request $request){
        $barcode = $request->barcode;
        $produk = Produk::where('barcode', $barcode)->first();

        //ListServiceOrder::insert($listOrder);
        //$dataOrder = ListServiceOrder::where('barcode', $barcode)->where('uid', $uid)->first();
        $data['a'] = Carbon::now()->toDateTimeString();
        $data['b'] = $produk;
        $data['c'] = 'unauth';

        if (in_array(Auth::user()->role, $this->auth)){
            $data['c'] = 'master';
        }
        return $data;
    }

    public function editApproval($id){
        $serviceorder = ServiceOrder::find($id);
        if(Auth::user()->role == "Master"){

            if(Auth::user()->divisi == "Sparepart"){
                if($serviceorder->approve_produk == 'false'){
                    $serviceorder->approve_produk = Auth::user()->name;
                } else {
                    $serviceorder->approve_produk = 'false';
                    $serviceorder->status = 'Proses';
                }
                $serviceorder->save();
            } elseif (Auth::user()->divisi == "Service"){
                if($serviceorder->approve_service == 'false') {
                    $serviceorder->approve_service = Auth::user()->name;
                } else {
                    $serviceorder->approve_service = 'false';
                    $serviceorder->status = 'Proses';
                }
                $serviceorder->save();
            } else {
                Flash::error('Anda tidak mempunyai otoritas untuk approval');
            }

            if($serviceorder->approve_produk != 'false' && $serviceorder->approve_service != 'false'){
                $serviceorder->status = 'Approved';
                $serviceorder->save();
            }

            return redirect(route('serviceOrders.index'));

        } else {
            Flash::error('Anda tidak mempunyai otoritas untuk approval');
            return redirect(route('serviceOrders.index'));
        }
    }

    public function editApprovalAffari($uid){
        $serviceorder = ServiceOrderAffariStatus::where('no_penawaran', $uid)->first();
        if($serviceorder==''){
            ServiceOrderAffariStatus::create([
                    'no_penawaran' => $uid,
                    'status' => 'Proses',
                    'approve_service' => 'false',
                    'approve_produk' => 'false'
                ]);
            return $this->editApprovalAffari($uid);
        } else {
            if(Auth::user()->role == "Master"){
                if(Auth::user()->divisi == "Sparepart"){
                    if($serviceorder->approve_produk == 'false'){
                        $serviceorder->approve_produk = Auth::user()->name;
                    } else {
                        $serviceorder->approve_produk = 'false';
                        $serviceorder->status = 'Proses';
                    }
                    $serviceorder->save();
                } elseif (Auth::user()->divisi == "Service"){
                    if($serviceorder->approve_service == 'false') {
                        $serviceorder->approve_service = Auth::user()->name;
                    } else {
                        $serviceorder->approve_service = 'false';
                        $serviceorder->status = 'Proses';
                    }
                    $serviceorder->save();
                } else {
                    Flash::error('Anda tidak mempunyai otoritas untuk approval');
                }

                if($serviceorder->approve_produk != 'false' && $serviceorder->approve_service != 'false'){
                    $serviceorder->status = 'Approved';
                    $serviceorder->save();
                }
                return redirect(route('serviceOrders.affari'));

            } else {
                Flash::error('Anda tidak mempunyai otoritas untuk approval');
                return redirect(route('serviceOrders.affari'));
            }
        }

    }

    public function editStatus($id, $newStatus){
        $serviceorder = ServiceOrder::find($id);
        $serviceorder->status = $newStatus;
        $serviceorder->save();
        $serviceorder = ServiceOrder::all();
        return redirect(route('serviceOrders.index'))
            ->with('serviceorder', $serviceorder);
    }

    public function editStatusAffari($id, $newStatus){
        $serviceorder = ServiceOrder::find($id);
        $serviceorder->status = $newStatus;
        $serviceorder->save();
        $serviceorder = ServiceOrder::all();
        return redirect(route('serviceOrders.index'))
            ->with('serviceorder', $serviceorder);
    }

    public function putService(Request $request){
        $barcode = $request->barcode;
        $service = Service::where('barcode', $barcode)->first();

        $data['a'] = Carbon::now()->toDateTimeString();
        $data['b'] = $service;
        $data['c'] = 'unauth';

        if (in_array(Auth::user()->role, $this->auth)){
            $data['c'] = 'master';
        }

        return $data;
    }

    public function export_excel($uid)
    {
        if(substr($uid, 0, 1) === 'O'){
            $sales_orders = ServiceOrderAffari::firstWhere('uid', $uid);
            return Excel::download(new ServiceOrderExport($uid), 'Sales Order SO '.$sales_orders->nama.'.xlsx');
        } else {
            $services_orders = ServiceOrder::firstWhere('uid', $uid);
            return Excel::download(new ServiceOrderExport($uid), 'Service Order SV'.$services_orders->id.'.xlsx');
        }
    }

    public function export_pdf($uid)
    {
        global $serviceOrder;
        global $totaldiscount;
        if(substr($uid,0,1) != 'O'){
            $serviceOrder = ServiceOrder::firstWhere('uid', $uid);
            $serviceOrder->times_printed = $serviceOrder->times_printed+1;
            $serviceOrder->save();
            $this->listorder = ListServiceOrder::orderBy('nourut', 'ASC')->Where('uid', $uid)->Where('type', 'part')->get();
            $this->listjasa = ListServiceOrder::orderBy('nourut', 'ASC')->Where('uid', $uid)->Where('type', 'service')->get();
            $totaldiscount = $this->listorder->sum('discount') + $this->listjasa->sum('discount');
            $totalproduk = $this->listorder->sum('subtotal');
            $totaljasa = $this->listjasa->sum('subtotal');
        } elseif(substr($uid,0,1) == 'O'){
            $serviceOrder = ServiceOrderAffari::firstWhere('uid', $uid);
            $status = ServiceOrderAffariStatus::firstWhere('no_penawaran', $uid);
            $status->times_printed = $status->times_printed+1;
            $status->save();
            $serviceOrder->times_printed = $status->times_printed;
            $this->showListOrderAffari($uid);
            $this->listorder = $this->listorderAffari->sortBy('nourut')->Where('type', '=','Part')->toArray();
            $this->listjasa = $this->listorderAffari->sortBy('nourut')->Where('type', '=','Service')->toArray();
            $totaldiscount = $this->listorderAffari->sum('discount');
            $totalproduk = $this->listorderAffari->Where('type', '=','Part')->sum('subtotal');
            $totaljasa = $this->listorderAffari->Where('type', '=','Service')->sum('subtotal');
        }

        $grandtotal = $totalproduk+$totaljasa;
        $date = new DateTime($serviceOrder->tanggal);
        $tanggal = $date->format('d F Y');
        $nama = $serviceOrder->nama;
        $produks = Produk::all();
        $services = Service::all();

        $pdf = PDF::loadView('service_orders.export.service_orders_pdf', [
            'serviceOrder'=>$serviceOrder,
            'listorder'=>$this->listorder,
            'totaldiscount'=>$totaldiscount,
            'listjasa'=>$this->listjasa,
            'grandtotal'=> $grandtotal,
            'totaljasa'=> $totaljasa,
            'totalproduk'=> $totalproduk,
            'tanggal'=> $tanggal,
            'produks'=> $produks,
            'services'=> $services
        ]);
        return $pdf->download('Service Order '.$nama.'.pdf');
    }

    public function export_pdf_simple($uid)
    {
        global $serviceOrder;
        global $totaldiscount;
        if(substr($uid,0,1) != 'O'){
            $serviceOrder = ServiceOrder::firstWhere('uid', $uid);
            $serviceOrder->times_printed = $serviceOrder->times_printed+1;
            $serviceOrder->save();
            $this->listorder = ListServiceOrder::orderBy('nourut', 'ASC')->Where('uid', $uid)->Where('type', 'part')->get();
            $this->listjasa = ListServiceOrder::orderBy('nourut', 'ASC')->Where('uid', $uid)->Where('type', 'service')->get();
            $totaldiscount = $this->listorder->sum('discount') + $this->listjasa->sum('discount');
            $totalproduk = $this->listorder->sum('subtotal');
            $totaljasa = $this->listjasa->sum('subtotal');
        } elseif(substr($uid,0,1) == 'O'){
            $serviceOrder = ServiceOrderAffari::firstWhere('uid', $uid);
            $status = ServiceOrderAffariStatus::firstWhere('no_penawaran', $uid);
            $status->times_printed = $status->times_printed+1;
            $status->save();
            $serviceOrder->times_printed = $status->times_printed;
            $this->showListOrderAffari($uid);
            $this->listorder = $this->listorderAffari->sortBy('nourut')->Where('type', '=','Part')->toArray();
            $this->listjasa = $this->listorderAffari->sortBy('nourut')->Where('type', '=','Service')->toArray();
            $totaldiscount = $this->listorderAffari->sum('discount');
            $totalproduk = $this->listorderAffari->Where('type', '=','Part')->sum('subtotal');
            $totaljasa = $this->listorderAffari->Where('type', '=','Service')->sum('subtotal');
        }

        $grandtotal = $totalproduk+$totaljasa;
        $date = new DateTime($serviceOrder->tanggal);
        $tanggal = $date->format('d F Y');
        $nama = $serviceOrder->nama;
        $produks = Produk::all();
        $services = Service::all();

        $pdf = PDF::loadView('service_orders.export.service_orders_pdf_ring', [
            'serviceOrder'=>$serviceOrder,
            'listorder'=>$this->listorder,
            'totaldiscount'=>$totaldiscount,
            'listjasa'=>$this->listjasa,
            'grandtotal'=> $grandtotal,
            'totaljasa'=> $totaljasa,
            'totalproduk'=> $totalproduk,
            'tanggal'=> $tanggal,
            'produks'=> $produks,
            'services'=> $services
        ]);
        return $pdf->download('Service Order '.$nama.'.pdf');
    }

    public function fetchServiceOrderAffari(){

        //Koneksi data server
        $sqlconnect = odbc_connect("Driver={SQL Server};Server=$this->server;Database=$this->database;", $this->username, $this->password);

        $sqlquery = "SELECT ";
        $sqlquery .= "NoTrans as uid, ";
        $sqlquery .= "NamaKons as nama, ";
        $sqlquery .= "TipeBrgDesc as mobil, ";
        $sqlquery .= "IMEI as nopol, ";
        $sqlquery .= "TglTrans as tanggal, ";
        $sqlquery .= "Operator ";
        $sqlquery .= "FROM ServiceOrderM ";
        $sqlquery .= "WHERE Waktu >= DATEADD(day,-15,GETDATE())";
        $sqlquery .= "and Waktu <= getdate()";

        $process = odbc_exec($sqlconnect, $sqlquery);
        $items = collect([]);
        ServiceOrderAffari::truncate();
        while(odbc_fetch_row($process)) {
            $itemAll = [
                'uid' => utf8_encode(odbc_result($process, 'uid')),
                'nama' => utf8_encode(odbc_result($process, 'nama')),
                'mobil' => utf8_encode(odbc_result($process, 'mobil')),
                'nopol' => utf8_encode(odbc_result($process, 'nopol')),
                'tanggal' => Carbon::parse(utf8_encode(odbc_result($process, 'tanggal')))->format('d-m-Y H:i:s') ,
                'operator' => utf8_encode(odbc_result($process, 'operator')),
                'no_penawaran' => utf8_encode(odbc_result($process,  'uid')),
            ];
            $items->push($itemAll);
        }
        odbc_close($sqlconnect);
        if ($items->isEmpty()){
            Flash::error('Gagal sinkron data');
        } else {
            ServiceOrderAffari::truncate();
            foreach (array_chunk($items->toArray(),1000)as $data)
            {
                ServiceOrderAffari::insert($data);
            }
        }
    }

    public function showListOrderAffari($uid){

        //Koneksi data server
        $sqlconnect = odbc_connect("Driver={SQL Server};Server=$this->server;Database=$this->database;", $this->username, $this->password);
        $sqlquery = "SELECT ";
        $sqlquery .= "NoTrans as uid, ";
        $sqlquery .= "NoUrut as nourut, ";
        $sqlquery .= "Tipe as type, ";
        $sqlquery .= "NamaBrg as ketnama, ";
        $sqlquery .= "stock.BarcodeAktif as barcode, ";
        $sqlquery .= "KodeBrg as bcodejasa, ";
        $sqlquery .= "ServiceOrderD.HJual + ServiceOrderD.Jasa as harga, ";
        $sqlquery .= "qty as qty, ";
        $sqlquery .= "jumlah as subtotal, ";
        $sqlquery .= "nDisc as discount ";
        $sqlquery .= "from ServiceOrderD ";
        $sqlquery .= "LEFT JOIN stock ON ServiceOrderD.IdItem = stock.id ";
        $sqlquery .= "WHERE NoTrans='$uid'";

        $process = odbc_exec($sqlconnect, $sqlquery);
        $this->listorderAffari = collect([]);
        while(odbc_fetch_row($process)) {
            $itemAll = [
                'uid' => utf8_encode(odbc_result($process, 'uid')),
                'nourut' => utf8_encode(odbc_result($process, 'nourut')),
                'ketnama' => utf8_encode(odbc_result($process, 'ketnama')),
                'type' => utf8_encode(odbc_result($process, 'type')),
                'barcode' => utf8_encode(odbc_result($process, 'barcode')),
                'bcodejasa' => utf8_encode(odbc_result($process, 'bcodejasa')),
                'harga' => floatval(odbc_result($process, 'harga')),
                'qty' => floatval(odbc_result($process, 'qty')),
                'subtotal' => floatval(odbc_result($process, 'subtotal')),
                'discount' => floatval(odbc_result($process, 'discount')),
                'keterangan' => '',
            ];
            $this->listorderAffari->push($itemAll);
        }
        odbc_close($sqlconnect);
    }

    public function showAffari($id){

        $serviceOrderAffari = ServiceOrderAffari::firstWhere('id', $id);
        $uid = $serviceOrderAffari->uid;
        if(ServiceOrderAffariStatus::firstWhere('no_penawaran', $uid) != ''){
            $status = ServiceOrderAffariStatus::firstWhere('no_penawaran', $uid)->status;
            $serviceOrderAffari->status = $status;
        }

        $this->showListOrderAffari($uid);

        $listorder = $this->listorderAffari->sortBy('nourut')->Where('type', '=','Part')->toArray();
        $listjasa = $this->listorderAffari->sortBy('nourut')->Where('type', '=','Service')->toArray();
        $totaldiscount = $this->listorderAffari->sum('discount');
        $totalproduk = $this->listorderAffari->Where('type', '=','Part')->sum('subtotal');
        $totaljasa = $this->listorderAffari->Where('type', '=','Service')->sum('subtotal');
        $grandtotal = $totalproduk+$totaljasa;
        $produks = Produk::all();
        $services = Service::all();

//         $output = new \Symfony\Component\Console\Output\ConsoleOutput();
//         $output->writeln("Data = $listorder");

        if (empty($serviceOrderAffari)) {
            Flash::error('Service Order not found');

            return redirect(route('serviceOrders.affari'));
        }

        return view('service_orders.show')
            ->with('serviceOrder', $serviceOrderAffari)
            ->with('listorder', $listorder)
            ->with('listjasa', $listjasa)
            ->with('totaljasa', $totaljasa)
            ->with('totaldiscount', $totaldiscount)
            ->with('totalproduk', $totalproduk)
            ->with('grandtotal', $grandtotal)
            ->with('services', $services)
            ->with('produks', $produks);

    }
}
