<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreaterequestbarangRequest;
use App\Http\Requests\UpdaterequestbarangRequest;
use App\Models\Produk;
use App\Models\requestbarang;
use App\Models\SalesOrder;
use App\Repositories\requestbarangRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;

use App\Exports\RequestbarangExport;
use Maatwebsite\Excel\Facades\Excel;

class requestbarangController extends AppBaseController

{
    /** @var  requestbarangRepository */
    private $requestbarangRepository;

    public function __construct(requestbarangRepository $requestbarangRepo)
    {
        $this->middleware('auth');

        $this->requestbarangRepository = $requestbarangRepo;
    }

    public function index(Request $request)
    {
        $requestbarangs = requestbarang::Where('status', 'Approved')->orWhere('status', 'Done')->get();
        return view('requestbarangs.index')->with('requestbarangs', $requestbarangs);
    }

    public function index_all($nama = null)
    {
        $requestbarangs = requestbarang::all();

        return view('requestbarangs.index_all')->with('requestbarangs', $requestbarangs)
            ->with('nama', $nama);
    }

    public function index_approval(Request $request)
    {
        $requestbarangs = requestbarang::all()->Where('status', 'Requested');
        $produks = Produk::all();
        return view('requestbarangs.index_approval')->with('requestbarangs', $requestbarangs)->with('produks', $produks);
    }

    public function approve_request($id)
    {
        $requestbarangs = requestbarang::find($id);
        if($requestbarangs->status == 'Proses'){
            $requestbarangs->status = 'Requested';
            $requestbarangs->approve_request = Auth::user()->name;
            $requestbarangs->requested_at = now();
            $requestbarangs->save();
            Flash::success('Berhasil, request dikonfirmasi.');
        } else if ($requestbarangs->status == 'Requested') {
            $requestbarangs->status = 'Proses';
            $requestbarangs->approve_request = null;
            $requestbarangs->requested_at = null;
            $requestbarangs->save();
            Flash::success('Request dibatalkan.');
        } else {
            Flash::error('Gagal, hubungi IT.');
        }
        return redirect(route('showAll'));
    }

    public function approve_purchase($id)
    {
        $requestbarangs = requestbarang::find($id);
        if($requestbarangs->status == 'Requested'){
            $requestbarangs->status = 'Approved';
            $requestbarangs->approve_purchase = Auth::user()->name;
            $requestbarangs->approved_at = now();
            $requestbarangs->save();
            Flash::success('Berhasil, request disetujui.');
        } else if ($requestbarangs->status == 'Approved') {
            $requestbarangs->status = 'Requested';
            $requestbarangs->approve_purchase = null;
            $requestbarangs->requested_at = null;
            $requestbarangs->save();
            Flash::success('Request dibatalkan.');
        } else {
            Flash::error('Gagal, request belum dikonfirmasi oleh Kepala Gudang.');
        }
        return redirect(route('requestbarang.index_approval'));
    }

    public function request_done($id)
    {
        $requestbarangs = requestbarang::find($id);
        if($requestbarangs->status == 'Approved'){
            $requestbarangs->status = 'Done';
            $requestbarangs->save();
            Flash::success('Berhasil, request selesai.');
        } else if ($requestbarangs->status == 'Done') {
            $requestbarangs->status = 'Approved';
            $requestbarangs->save();
            Flash::success('Request dibatalkan.');
        } else {
            Flash::error('Gagal, request belum dikonfirmasi.');
        }
        return redirect(route('requestbarangs.index'));
    }

    public function create()
    {
        $produks = Produk::all();
        return view('requestbarangs.create')
            ->with('produks', $produks);
    }

    public function store(CreaterequestbarangRequest $request)
    {
        $input = $request->all();

        $requestbarang = $this->requestbarangRepository->create($input);

        Flash::success('Sukses tambah data.');
        return redirect(route('requestbarangs.index'));
    }

    public function show($id)
    {
        $requestbarang = $this->requestbarangRepository->find($id);

        if (empty($requestbarang)) {
            Flash::error('Requestbarang not found');

            return redirect(route('requestbarangs.index'));
        }

        return view('requestbarangs.show')->with('requestbarang', $requestbarang);
    }

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
        $barcodeX = $barcode;
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
