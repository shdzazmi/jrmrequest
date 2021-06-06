<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateServiceOrderRequest;
use App\Http\Requests\UpdateServiceOrderRequest;
use App\Models\ListOrder;
use App\Models\ListOrderAffari;
use App\Models\ListServiceOrder;
use App\Models\Produk;
use App\Models\SalesOrder;
use App\Models\SalesOrderAffari;
use App\Models\Service;
use App\Models\ServiceOrder;
use App\Repositories\ServiceOrderRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Webpatser\Uuid\Uuid;

use Dompdf\Dompdf;
use PDF;

class ServiceOrderController extends AppBaseController
{
    /** @var  ServiceOrderRepository */
    private $serviceOrderRepository;

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

    /**
     * Show the form for creating a new ServiceOrder.
     *
     */
    public function create()
    {
        $uid = substr(Uuid::generate(4),24);
        $produks = Produk::all();
        $services = Service::all();
        return view('service_orders.create')->with('produks', $produks)->with('services', $services)->with('uid', $uid);
    }

    public function store(CreateServiceOrderRequest $request)
    {
        $input = $request->all();
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
        $listorder = ListServiceOrder::all()->Where('uid', $uid)->Where('type', 'part');
        $listjasa = ListServiceOrder::all()->Where('uid', $uid)->Where('type', 'service');
        $totaldiscount = $listorder->sum('discount');
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

        $listorder = ListServiceOrder::all()->Where('uid', $uid);
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
            ->with('listorder', $listorder);
    }

    /**
     * Update the specified ServiceOrder in storage.
     *
     * @param int $id
     * @param UpdateServiceOrderRequest $request
     */
    public function update($id, UpdateServiceOrderRequest $request)
    {
        $serviceOrder = $this->serviceOrderRepository->find($id);

        if (empty($serviceOrder)) {
            Flash::error('Service Order not found');

            return redirect(route('serviceOrders.index'));
        }

        $serviceOrder = $this->serviceOrderRepository->update($request->all(), $id);

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
                'type' => $request->type,
                'barcode' => $barcode,
                'ketnama' => $request->ketnama,
                'keterangan' => $request->keterangan,
                'harga' => $request->harga,
                'qty' => $request->qty,
                'subtotal' => $request->subtotal,
                'discount' => $request->discount,
            ]);
        return false;
    }

    /**
     * Remove the specified ServiceOrder from storage.
     *
     * @param int $id
     *
     * @throws \Exception
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
        $uid = $request->uid;
        $type = $request->type;
        $produk = Produk::where('barcode', $barcode)->first();
        $cekproduk = ListServiceOrder::where('barcode', $barcode)->where('uid', $uid)->first();

        if (empty($cekproduk)){
            $listOrder = [
                'uid' => $uid,
                'type' => $type,
                'barcode' => $barcode,
            ];
            ListServiceOrder::insert($listOrder);
            $dataOrder = ListServiceOrder::where('barcode', $barcode)->where('uid', $uid)->first();
            $data['a'] = $dataOrder;
            $data['b'] = $produk;

            return $data;
        } else {
            return "added";
        }
    }

    public function putService(Request $request){
        $barcode = $request->barcode;
        $uid = $request->uid;
        $type = $request->type;
        $service = Service::where('barcode', $barcode)->first();
        $cekservice = ListServiceOrder::where('barcode', $barcode)->where('uid', $uid)->first();

        if (empty($cekservice)){
            $listOrder = [
                'uid' => $uid,
                'type' => $type,
                'barcode' => $barcode,
            ];
            ListServiceOrder::insert($listOrder);
            $dataOrder = ListServiceOrder::where('barcode', $barcode)->where('uid', $uid)->first();
            $data['a'] = $dataOrder;
            $data['b'] = $service;

            return $data;
        } else {
            return "added";
        }
    }

    public function export_pdf($uid)
    {
        $serviceOrder = ServiceOrder::firstWhere('uid', $uid);
        $listorder = ListServiceOrder::all()->Where('uid', $uid)->Where('type', 'part');
        $listjasa = ListServiceOrder::all()->Where('uid', $uid)->Where('type', 'service');
        $totaldiscount = $listorder->sum('discount');
        $totalproduk = $listorder->sum('subtotal');
        $totaljasa = $listjasa->sum('subtotal');
        $grandtotal = $totalproduk+$totaljasa;
        $date = new \DateTime($serviceOrder->tanggal);
        $tanggal = $date->format('d F Y');
        $nama = $serviceOrder->nama;
        $produks = Produk::all();
        $services = Service::all();

        $pdf = PDF::loadView('service_orders.export.service_orders_pdf', [
            'serviceOrder'=>$serviceOrder,
            'listorder'=>$listorder,
            'totaldiscount'=>$totaldiscount,
            'listjasa'=>$listjasa,
            'grandtotal'=> $grandtotal,
            'totaljasa'=> $totaljasa,
            'totalproduk'=> $totalproduk,
            'tanggal'=> $tanggal,
            'produks'=> $produks,
            'services'=> $services
        ]);
        return $pdf->download('Sales Order '.$nama.'.pdf');
    }
}
