<?php

namespace App\Http\Controllers;

use App\Exports\SalesOrderDashboardExport;
use App\Http\Requests\CreateSalesOrderRequest;
use App\Http\Requests\UpdateSalesOrderRequest;
use App\Models\ListOrder;
use App\Models\ListOrderAffari;
use App\Models\Produk;
use App\Models\SalesOrder;
use App\Models\SalesOrderAffari;
use App\Repositories\SalesOrderRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Response;
use Webpatser\Uuid\Uuid;

use Dompdf\Dompdf;
use PDF;

use App\Exports\SalesorderExport;
use Maatwebsite\Excel\Facades\Excel;

class SalesOrderController extends AppBaseController
{
    // Data server
    private string $server = '192.168.1.172\SQL2008';
    private string $database = 'JRM';
    private string $username = 'sa';
    private string $password = 'MasteR99';
    private array $auth = array('Master', 'Dev');


    /** @var  SalesOrderRepository */
    private $salesOrderRepository;

    public function __construct(SalesOrderRepository $salesOrderRepo)
    {
        $this->middleware('auth');

        $this->salesOrderRepository = $salesOrderRepo;
    }

    /**
     * Display a listing of the SalesOrder.
     *
     * @param Request $request
     *
     */
    public function index(Request $request)
    {
        $this->refreshAffari();

        $salesOrders = $this->salesOrderRepository->all();
        $salesOrderAffari = SalesOrderAffari::all();
        if(request()->ajax()) {
            return datatables()->of(SalesOrder::select('*'))
                ->addColumn('action', 'sales_orders.bladeaction.action_sales_order')
                ->addColumn('status', 'sales_orders.bladeaction.badge_sales_order')
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return view('sales_orders.index')
            ->with('salesOrders', $salesOrders)->with('salesOrderAffari', $salesOrderAffari);
    }

    /**
     * Show the form for creating a new SalesOrder.
     *
     */

    public function create()
    {
        $produks = Produk::all();
        $uid = substr(Uuid::generate(4),24);
        $status = "Proses";
        return view('sales_orders.create')->with('produks', $produks)->with('uid', $uid)->with('status', $status);
    }

    /**
     * Store a newly created SalesOrder in storage.
     *
     * @param CreateSalesOrderRequest $request
     *
     */

    public function store(CreateSalesOrderRequest $request)
    {
        $input = $request->all();

        $salesOrder = $this->salesOrderRepository->create($input);
        Flash::success('Sukses tambah data.');
        $id = SalesOrder::firstWhere('uid', $request->uid);
        // $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        // $output->writeln("Data = ");
        return $id;
    }

    public function putItem(Request $request){
        $barcode = $request->barcode;
        $uid = $request->uid;
        $produk = Produk::where('barcode', $barcode)->first();
        $cekproduk = ListOrder::where('barcode', $barcode)->where('uid', $uid)->first();

        if (empty($cekproduk)){
            $listOrder = [
                'uid' => $uid,
                'nama' => $produk->nama,
                'ketnama' => $produk->ketnama,
                'barcode' => $barcode,
                'kd_supplier' => $produk->kd_supplier,
                'kendaraan' => $produk->kendaraan,
                'partno1' => $produk->partno1,
                'partno2' => $produk->partno2,
                'lokasi1' => $produk->lokasi1,
                'lokasi2' => $produk->lokasi2,
                'lokasi3' => $produk->lokasi3,
                'stokTk' => $produk->qtyTk,
                'stokGd' => $produk->qtyGd,
                'satuan' => $produk->satuan,
                'merek' => $produk->merek
            ];
            ListOrder::insert($listOrder);
            $dataOrder = ListOrder::where('barcode', $barcode)->where('uid', $uid)->first();
            $data['a'] = $dataOrder;
            $data['b'] = $produk;

            return $data;
        } else {
            return "added";
        }
    }

    public function updateData(Request $request){
        $barcode = $request->barcode;
        $produk = Produk::where('barcode', $barcode)->first();
        $id = $request->id;

        ListOrder::updateOrCreate(['id' => $id],
            [
                'uid' => $request->uid,
                'nama' => $produk->nama,
                'ketnama' => $produk->ketnama,
                'barcode' => $barcode,
                'kd_supplier' => $produk->kd_supplier,
                'kendaraan' => $produk->kendaraan,
                'partno1' => $produk->partno1,
                'partno2' => $produk->partno2,
                'lokasi1' => $produk->lokasi1,
                'lokasi2' => $produk->lokasi2,
                'lokasi3' => $produk->lokasi3,
                'harga' => $request->harga,
                'qty' => $request->qty,
                'subtotal' => $request->subtotal,
                'stokTk' => $produk->qtyTk,
                'stokGd' => $produk->qtyGd,
                'satuan' => $produk->satuan,
                'merek' => $produk->merek
            ]);

        return false;
    }

    /**
     * Display the specified SalesOrder.
     *
     * @param int $id
     *
     */
    public function show($id)
    {
        $salesOrder = $this->salesOrderRepository->find($id);
        $uid = $salesOrder->uid;
        $listorder = ListOrder::all()->Where('uid', $uid);
        $totalharga = $listorder->sum('subtotal');
        $produks = Produk::all();

        if (empty($salesOrder)) {
            Flash::error('Sales Order not found');

            return redirect(route('salesOrders.index'));
        }

        return view('sales_orders.show')->with('salesOrder', $salesOrder)->with('listorder', $listorder)->with('totalharga', $totalharga)->with('produks', $produks);
    }

    public function showAffari($id)
    {
        $salesOrderAffari = SalesOrderAffari::firstWhere('id', $id);
        $uid = $salesOrderAffari->uid;
        $listorderAffari = ListOrderAffari::all()->Where('uid', $uid);
        $totalharga = $listorderAffari->sum('subtotal');
        $produks = Produk::all();

        if (empty($salesOrderAffari)) {
            Flash::error('Sales Order not found');

            return redirect(route('salesOrders.index'));
        }

        return view('sales_orders.show')->with('salesOrder', $salesOrderAffari)->with('listorder', $listorderAffari)->with('totalharga', $totalharga)->with('produks', $produks);
    }

    /**
     * Show the form for editing the specified SalesOrder.
     *
     * @param int $id
     *
     */

    public function edit($id)
    {
        $salesOrder = $this->salesOrderRepository->find($id);
        $uid = $salesOrder->uid;

        $listorder = ListOrder::all()->Where('uid', $uid);
        $produks = Produk::all();

        if (empty($salesOrder)) {
            Flash::error('Sales Order not found');

            return redirect(route('salesOrders.index'));
        }

        return view('sales_orders.edit')
            ->with('salesOrder', $salesOrder)
            ->with('produks', $produks)
            ->with('listorder', $listorder);
    }

    public function editStatus($id, $newStatus){
        $salesorder = SalesOrder::find($id);
        $salesorder->status = $newStatus;
        $salesorder->save();
        $salesOrders = SalesOrder::all();
        return redirect(route('salesOrders.index'))
            ->with('salesOrders', $salesOrders);
    }

    /**
     * Update the specified SalesOrder in storage.
     *
     * @param int $id
     * @param UpdateSalesOrderRequest $request
     *
     */
    public function update($id, UpdateSalesOrderRequest $request)
    {
        $salesOrder = $this->salesOrderRepository->find($id);

        if (empty($salesOrder)) {
            Flash::error('Sales Order not found');

            return redirect(route('salesOrders.index'));
        }

        $salesOrder = $this->salesOrderRepository->update($request->all(), $id);

        Flash::success('Sales Order updated successfully.');
        $id = SalesOrder::firstWhere('uid', $request->uid);

        return $id;
    }

    /**
     * Remove the specified SalesOrder from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        $salesOrder = $this->salesOrderRepository->find($id);
        $uid = $salesOrder->uid;
        $listOrder = ListOrder::where('uid', $uid);

        if (empty($salesOrder)) {
            Flash::error('Sales Order not found');

            return redirect(route('salesOrders.index'));
        }

        $this->salesOrderRepository->delete($id);
        $listOrder->delete();

        Flash::success('Sales Order deleted successfully.');

        return redirect(route('salesOrders.index'));
    }

    public function export_pdf($uid)
    {
        if(substr($uid, 0, 1) === 'S'){
            $salesOrder = SalesOrderAffari::firstWhere('uid', $uid);
            $listorder = ListOrderAffari::all()->where('uid', $uid);
        } else {
            $salesOrder = SalesOrder::firstWhere('uid', $uid);
            $listorder = ListOrder::all()->where('uid', $uid);
        }
        $totalharga = $listorder->sum('subtotal');
        $date = new \DateTime($salesOrder->tanggal);
        $tanggal = $date->format('d F Y');
        $nama = $salesOrder->nama;
        $produks = Produk::all();
//        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
//        $output->writeln("listorder = $produk");

        $pdf = PDF::loadView('sales_orders.export.sales_orders_pdf', ['salesOrder'=>$salesOrder, 'listorder'=>$listorder, 'totalharga'=> $totalharga, 'tanggal'=> $tanggal, 'produks'=> $produks]);
        return $pdf->download('Sales Order '.$nama.'.pdf');
    }

    public function export_excel($uid)
    {
        if(substr($uid, 0, 1) === 'S'){
            $sales_orders = SalesOrderAffari::firstWhere('uid', $uid);
            return Excel::download(new SalesorderExport($uid), 'Sales Order SO '.$sales_orders->nama.'.xlsx');
        } else {
            $sales_orders = SalesOrder::firstWhere('uid', $uid);
            return Excel::download(new SalesorderExport($uid), 'Sales Order SO'.$sales_orders->id.'.xlsx');
        }
    }

    public function dashboard_export_excel()
    {
        return Excel::download(new SalesOrderDashboardExport(), 'Dashboard Sales Order.xlsx');
    }

    public function getdetails($id)
    {
        $salesOrder = $this->salesOrderRepository->find($id);
        $uid = $salesOrder->uid;
        $listOrder = ListOrder::all()->where('uid', $uid);
        // $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        // $output->writeln("listorder = $listOrder");
        return $listOrder;
    }

    public function refreshAffari(){
        $this->fetchSalesOrderAffari();
        $this->fetchListOrderAffari();
        return null;
    }

    public function fetchSalesOrderAffari(){

        //Koneksi data server
        $sqlconnect = odbc_connect("Driver={SQL Server};Server=$this->server;Database=$this->database;", $this->username, $this->password);

        $sqlquery = "SELECT ";
        $sqlquery .= "NoTrans as uid, ";
        $sqlquery .= "Nama as nama, ";
        $sqlquery .= "waktu as tanggal, ";
        $sqlquery .= "Operator as operator ";
        $sqlquery .= "FROM SOM ";

        $process = odbc_exec($sqlconnect, $sqlquery);
        $items = collect([]);
        SalesOrderAffari::truncate();
        while(odbc_fetch_row($process)) {
            $itemAll = [
                'uid' => utf8_encode(odbc_result($process, 'uid')),
                'nama' => utf8_encode(odbc_result($process, 'nama')),
                'tanggal' => \Carbon\Carbon::parse(utf8_encode(odbc_result($process, 'tanggal')))->format('d-m-Y H:i:s') ,
                'operator' => utf8_encode(odbc_result($process, 'operator')),
                'status' => 'Proses',
                'created_at' => \Carbon\Carbon::now()->toDateTime(),
            ];
            $items->push($itemAll);
        }
        odbc_close($sqlconnect);
        if ($items->isEmpty()){
            Flash::error('Gagal sinkron data');
        } else {
            SalesOrderAffari::truncate();
            foreach (array_chunk($items->toArray(),1000)as $data)
            {
                SalesOrderAffari::insert($data);
            }
        }

    }

    public function fetchListOrderAffari(){
        //Koneksi data server
        $sqlconnect = odbc_connect("Driver={SQL Server};Server=$this->server;Database=$this->database;", $this->username, $this->password);

        $sqlquery = "SELECT ";
        $sqlquery .= "NoTrans as uid, ";
        $sqlquery .= "stock.BarcodeAktif as barcode, ";
        $sqlquery .= "SOD.HJual as harga, ";
        $sqlquery .= "qty as qty, ";
        $sqlquery .= "jumlah as subtotal ";
        $sqlquery .= "from SOD ";
        $sqlquery .= "LEFT JOIN stock ON SOD.IdItem = stock.id ";
        ListOrderAffari::truncate();
        $process = odbc_exec($sqlconnect, $sqlquery);
        $items = collect([]);
        while(odbc_fetch_row($process)) {
            $itemAll = [
                'uid' => utf8_encode(odbc_result($process, 'uid')),
                'barcode' => utf8_encode(odbc_result($process, 'barcode')),
                'harga' => floatval(odbc_result($process, 'harga')),
                'qty' => floatval(odbc_result($process, 'qty')),
                'subtotal' => floatval(odbc_result($process, 'subtotal')),
            ];
            $items->push($itemAll);
        }
        odbc_close($sqlconnect);
        if ($items->isEmpty()){
            Flash::error('Gagal sinkron data');
        } else {
            ListOrderAffari::truncate();
            foreach (array_chunk($items->toArray(),1000)as $data)
            {
                ListOrderAffari::insert($data);
            }
        }
    }
}
