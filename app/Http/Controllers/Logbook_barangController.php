<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLogbook_barangRequest;
use App\Http\Requests\UpdateLogbook_barangRequest;
use App\Models\requestbarang;
use App\Repositories\Logbook_barangRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Logbook_barangController extends AppBaseController
{
    /** @var  Logbook_barangRepository */
    private $logbookBarangRepository;

    public function __construct(Logbook_barangRepository $logbookBarangRepo)
    {
        $this->logbookBarangRepository = $logbookBarangRepo;
    }

    /**
     * Display a listing of the Logbook_barang.
     *
     * @param Request $request
     *
     */
    public function index(Request $request)
    {
        $logbookBarangs = $this->logbookBarangRepository->all();
        return view('logbook_barangs.index')->with('logbookBarangs', $logbookBarangs);
    }

    /**
     * Show the form for creating a new Logbook_barang.
     *
     */
    public function create()
    {
        return view('logbook_barangs.create');
    }

    /**
     * Store a newly created Logbook_barang in storage.
     *
     * @param CreateLogbook_barangRequest $request
     *
     */
    public function store(CreateLogbook_barangRequest $request)
    {
        $input = $request->all();

        $logbookBarang = $this->logbookBarangRepository->create($input);

        Flash::success('Logbook Barang saved successfully.');

        return redirect(route('logbookBarangs.index'));
    }

    /**
     * Display the specified Logbook_barang.
     *
     * @param int $id
     *
     */
    public function show($id)
    {
        $logbookBarang = $this->logbookBarangRepository->find($id);

        if (empty($logbookBarang)) {
            Flash::error('Logbook Barang not found');

            return redirect(route('logbookBarangs.index'));
        }

        return view('logbook_barangs.show')->with('logbookBarang', $logbookBarang);
    }

    /**
     * Show the form for editing the specified Logbook_barang.
     *
     * @param int $id
     *
     */
    public function edit($id)
    {
        $logbookBarang = $this->logbookBarangRepository->find($id);

        if (empty($logbookBarang)) {
            Flash::error('Logbook Barang not found');

            return redirect(route('logbookBarangs.index'));
        }

        return view('logbook_barangs.edit')->with('logbookBarang', $logbookBarang);
    }

    /**
     * Update the specified Logbook_barang in storage.
     *
     * @param int $id
     * @param UpdateLogbook_barangRequest $request
     *
     */
    public function update($id, UpdateLogbook_barangRequest $request)
    {
        $logbookBarang = $this->logbookBarangRepository->find($id);

        if (empty($logbookBarang)) {
            Flash::error('Logbook Barang not found');

            return redirect(route('logbookBarangs.index'));
        }

        $logbookBarang = $this->logbookBarangRepository->update($request->all(), $id);

        Flash::success('Logbook Barang updated successfully.');

        return redirect(route('logbookBarangs.index'));
    }

    /**
     * Remove the specified Logbook_barang from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        $logbookBarang = $this->logbookBarangRepository->find($id);

        if (empty($logbookBarang)) {
            Flash::error('Logbook Barang not found');

            return redirect(route('logbookBarangs.index'));
        }

        $this->logbookBarangRepository->delete($id);

        Flash::success('Logbook Barang deleted successfully.');

        return redirect(route('logbookBarangs.index'));
    }
}
