<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLogbookRequest;
use App\Http\Requests\UpdateLogbookRequest;
use App\Models\karyawan;
use App\Models\ListOrder;
use App\Models\Logbook;
use App\Repositories\LogbookRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Response;

class LogbookController extends AppBaseController
{
    /** @var  LogbookRepository */
    private $logbookRepository;

    public function __construct(LogbookRepository $logbookRepo)
    {
        $this->logbookRepository = $logbookRepo;
    }

    /**
     * Display a listing of the Logbook.
     *
     * @param Request $request
     *
     */
    public function index(Request $request)
    {
        $logbooks = $this->logbookRepository->all();
        $karyawans = karyawan::all();

        return view('logbooks.index')
            ->with('logbooks', $logbooks)->with('karyawan', $karyawans);
    }

    /**
     * Show the form for creating a new Logbook.
     *
     */
    public function create()
    {
        return view('logbooks.create');
    }

    /**
     * Store a newly created Logbook in storage.
     *
     * @param CreateLogbookRequest $request
     *
     */
    public function store(Request $request)
    {
        $item = [
            'id_karyawan' => $request->id_karyawan,
            'waktu' => Carbon::now()->toDateTimeString(),
            'status' => $request->status,
            'keterangan' => $request->keterangan
        ];

        $logbook = $this->logbookRepository->create($item);

        Flash::success('Logbook saved successfully.');

        return redirect(route('security'));
    }

    public function storeajax(Request $request)
    {
        $item = [
            'id_karyawan' => $request->id,
            'waktu' => Carbon::now()->toDateTimeString(),
            'status' => $request->status,
            'keterangan' => $request->keterangan
];
        Logbook::insert($item);

        return null;
    }

    /**
     * Display the specified Logbook.
     *
     * @param int $id
     *
     */
    public function show($id)
    {
        $logbook = $this->logbookRepository->find($id);

        if (empty($logbook)) {
            Flash::error('Logbook not found');

            return redirect(route('security'));
        }

        return view('logbooks.show')->with('logbook', $logbook);
    }

    /**
     * Show the form for editing the specified Logbook.
     *
     * @param int $id
     *
     */
    public function edit($id)
    {
        $logbook = $this->logbookRepository->find($id);

        if (empty($logbook)) {
            Flash::error('Logbook not found');

            return redirect(route('security'));
        }

        return view('logbooks.edit')->with('logbook', $logbook);
    }

    /**
     * Update the specified Logbook in storage.
     *
     * @param int $id
     * @param UpdateLogbookRequest $request
     *
     */
    public function update($id, UpdateLogbookRequest $request)
    {
        $logbook = $this->logbookRepository->find($id);

        if (empty($logbook)) {
            Flash::error('Logbook not found');

            return redirect(route('security'));
        }

        $logbook = $this->logbookRepository->update($request->all(), $id);

        Flash::success('Logbook updated successfully.');

        return redirect(route('security'));
    }

    /**
     * Remove the specified Logbook from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        $logbook = $this->logbookRepository->find($id);

        if (empty($logbook)) {
            Flash::error('Logbook not found');

            return redirect(route('security'));
        }

        $this->logbookRepository->delete($id);

        Flash::success('Logbook deleted successfully.');

        return redirect(route('security'));
    }
}
