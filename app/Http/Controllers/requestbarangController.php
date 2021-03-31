<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreaterequestbarangRequest;
use App\Http\Requests\UpdaterequestbarangRequest;
use App\Models\Produk;
use App\Repositories\requestbarangRepository;
use App\Http\Controllers\AppBaseController;
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
        $requestbarangs = $this->requestbarangRepository->paginate(25);

        return view('requestbarangs.index')
            ->with('requestbarangs', $requestbarangs);
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

        Flash::success('Requestbarang saved successfully.');

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

    public function export_excel()
    {
        $datetime = \Carbon\Carbon::now()->toDateTimeString();
        $datetimes = \Carbon\Carbon::parse($datetime)->format('d-m-Y H;i');
        return Excel::download(new RequestbarangExport, 'Request Barang '.$datetimes.'.xlsx');
    }
}
