<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSalesOrderRequest;
use App\Http\Requests\UpdateSalesOrderRequest;
use App\Models\ListOrder;
use App\Models\Produk;
use App\Models\SalesOrder;
use App\Repositories\SalesOrderRepository;
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
     * @return Response
     */
    public function index(Request $request)
    {
        $salesOrders = $this->salesOrderRepository->all();
        if(request()->ajax()) {
            return datatables()->of(SalesOrder::select('*'))
                ->addColumn('action', 'sales_orders.bladeaction.action_sales_order')
                ->addColumn('status', 'sales_orders.bladeaction.badge_sales_order')
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return view('sales_orders.index')
            ->with('salesOrders', $salesOrders);
    }

    /**
     * Show the form for creating a new SalesOrder.
     *
     * @return Response
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
     * @return Response
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
                'satuan' => $produk->satuan
            ]);

        return false;
    }

    /**
     * Display the specified SalesOrder.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $salesOrder = $this->salesOrderRepository->find($id);
        $uid = $salesOrder->uid;
        $listorder = ListOrder::all()->Where('uid', $uid);
        $totalharga = $listorder->sum('subtotal');

        if (empty($salesOrder)) {
            Flash::error('Sales Order not found');

            return redirect(route('salesOrders.index'));
        }

        return view('sales_orders.show')->with('salesOrder', $salesOrder)->with('listorder', $listorder)->with('totalharga', $totalharga);
    }

    /**
     * Show the form for editing the specified SalesOrder.
     *
     * @param int $id
     *
     * @return Response
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
     * @return Response
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
     * @return Response
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

    public function export_pdf($id)
    {
        $salesOrder = $this->salesOrderRepository->find($id);
        $uid = $salesOrder->uid;
        $listorder = ListOrder::all()->where('uid', $uid);
        $totalharga = $listorder->sum('subtotal');
        $date = new \DateTime($salesOrder->tanggal);
        $tanggal = $date->format('d F Y');
        $nama = $salesOrder->nama;
        $produk = Produk::all();

        $pdf = PDF::loadView('sales_orders.export.sales_orders_pdf', ['salesOrder'=>$salesOrder, 'produk'=>$produk, 'listorder'=>$listorder, 'totalharga'=> $totalharga, 'tanggal'=> $tanggal]);
        return $pdf->download('Sales Order '.$nama.' SO'.$id.'.pdf');
    }

    public function export_excel($id)
    {
        return Excel::download(new SalesorderExport($id), 'Sales Order SO'.$id.'.xlsx');
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

}
