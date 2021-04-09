<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSalesOrderRequest;
use App\Http\Requests\UpdateSalesOrderRequest;
use App\Models\ListOrder;
use App\Models\Produk;
use App\Repositories\SalesOrderRepository;
use Illuminate\Http\Request;
use Flash;
use Response;
use Webpatser\Uuid\Uuid;

class SalesOrderController extends AppBaseController
{
    /** @var  SalesOrderRepository */
    private $salesOrderRepository;

    public function __construct(SalesOrderRepository $salesOrderRepo)
    {
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
        $list_order = ListOrder::all();
        $datetime = \Carbon\Carbon::now()->toDateTimeString();
        $datetimes = \Carbon\Carbon::parse($datetime)->format('d-m-Y H:i:s');
        $uuid = substr(Uuid::generate(4),24);
        return view('sales_orders.create')->with('datetimes', $datetimes)->with('produks', $produks)->with('list_order', $list_order)->with('uuid', $uuid);
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

        return redirect(route('salesOrders.index'));
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

        if (empty($salesOrder)) {
            Flash::error('Sales Order not found');

            return redirect(route('salesOrders.index'));
        }

        return view('sales_orders.show')->with('salesOrder', $salesOrder);
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
        $produks = Produk::all();
        if (empty($salesOrder)) {
            Flash::error('Sales Order not found');

            return redirect(route('salesOrders.index'));
        }

        return view('sales_orders.edit')->with('salesOrder', $salesOrder)->with('produks', $produks);
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

        return redirect(route('salesOrders.index'));
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

        if (empty($salesOrder)) {
            Flash::error('Sales Order not found');

            return redirect(route('salesOrders.index'));
        }

        $this->salesOrderRepository->delete($id);

        Flash::success('Sales Order deleted successfully.');

        return redirect(route('salesOrders.index'));
    }
}
