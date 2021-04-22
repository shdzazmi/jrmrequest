<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreaterequestbarangRequest;
use App\Http\Requests\UpdaterequestbarangRequest;
use App\Models\Produk;
use App\Models\requestbarang;
use App\Repositories\requestbarangRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Exports\RequestbarangExport;
use Maatwebsite\Excel\Facades\Excel;

class requestbarangController extends AppBaseController

{
    /** @var  requestbarangRepository */
    private $requestbarangRepository;

    public function __construct(requestbarangRepository $requestbarangRepo)
    {
        $this->requestbarangRepository = $requestbarangRepo;
    }

    /**
     * Display a listing of the requestbarang.
     *
     * @param Request $request
     *
     * @return Response
     */

    public function index(Request $request)
    {

        if(request()->ajax()) {
            return datatables()->of(requestbarang::select('nama', 'barcode', 'kd_supplier', 'kendaraan',\DB::raw('COUNT(id) as amount'))
                ->groupBy('nama', 'barcode', 'kd_supplier', 'kendaraan'))
                ->addColumn('amount', 'requestbarangs.bladeaction.amount_requestbarangs')
                ->addColumn('namabarcode', 'requestbarangs.bladeaction.nama_requestbarangs')
                ->addColumn('action', 'requestbarangs.bladeaction.dashboard_action_requestbarangs')
                ->rawColumns(['namabarcode','amount','action'])
                ->make(true);
        }
        return view('requestbarangs.index');
    }

    /**
     * Show the form for creating a new requestbarang.
     *
     * @return Response
     */
    public function create()
    {
        $produks = Produk::all();
        return view('requestbarangs.create')
            ->with('produks', $produks);
    }

    /**
     * Store a newly created requestbarang in storage.
     *
     * @param CreaterequestbarangRequest $request
     *
     * @return Response
     */
    public function store(CreaterequestbarangRequest $request)
    {
        $input = $request->all();

        $requestbarang = $this->requestbarangRepository->create($input);

        Flash::success('Sukses tambah data.');
        return redirect(route('requestbarangs.index'));
    }

    /**
     * Display the specified requestbarang.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $requestbarang = $this->requestbarangRepository->find($id);

        if (empty($requestbarang)) {
            Flash::error('Requestbarang not found');

            return redirect(route('requestbarangs.index'));
        }

        return view('requestbarangs.show')->with('requestbarang', $requestbarang);
    }

    public function showAll($nama = null)
    {
        if(request()->ajax()) {
            return datatables()->of(requestbarang::select('*'))
                ->addColumn('namabarcode', 'requestbarangs.bladeaction.nama_requestbarangs')
                ->addColumn('action', 'requestbarangs.bladeaction.action_requestbarangs')
                ->rawColumns(['action','namabarcode'])
                ->make(true);
        }
        return view('requestbarangs.show_all')->with('nama', $nama);
    }

    /**
     * Show the form for editing the specified requestbarang.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $requestbarang = $this->requestbarangRepository->find($id);
        $produks = Produk::all();
        if (empty($requestbarang)) {
            Flash::error('Requestbarang not found');

            return redirect(route('requestbarangs.index'));
        }
        return view('requestbarangs.edit')
            ->with('requestbarang', $requestbarang)
            ->with('produks', $produks);
    }

    /**
     * Update the specified requestbarang in storage.
     *
     * @param int $id
     * @param UpdaterequestbarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdaterequestbarangRequest $request)
    {
        $requestbarang = $this->requestbarangRepository->find($id);

        if (empty($requestbarang)) {
            Flash::error('Requestbarang not found');

            return redirect(route('requestbarangs.index'));
        }

        $requestbarang = $this->requestbarangRepository->update($request->all(), $id);

        Flash::success('Requestbarang updated successfully.');

        return redirect(route('requestbarangs.index'));
    }

    /**
     * Remove the specified requestbarang from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $requestbarang = $this->requestbarangRepository->find($id);

        if (empty($requestbarang)) {
            Flash::error('Requestbarang not found');

            return redirect(route('requestbarangs.index'));
        }

        $this->requestbarangRepository->delete($id);

        Flash::success('Requestbarang deleted successfully.');
        return redirect(route('requestbarangs.index'));
    }

    public function destroyAll($barcode)
    {
        $barcodeX = "01/".$barcode;
        $requestbarang = requestbarang::where('barcode', $barcodeX);

        if (empty($requestbarang)) {
            Flash::error($barcodeX." not found");

            return redirect(route('requestbarangs.index'));
        }

        $requestbarang->delete();

        Flash::success($barcodeX.' deleted successfully.');
        return redirect(route('requestbarangs.index'));
    }

    public function export_excel()
    {
        $datetime = Carbon::now()->toDateTimeString();
        $datetimes = Carbon::parse($datetime)->format('d-m-Y H;i');
        return Excel::download(new RequestbarangExport, 'Request Barang '.$datetimes.'.xlsx');
    }
}
