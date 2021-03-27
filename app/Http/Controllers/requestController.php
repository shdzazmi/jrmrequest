<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreaterequestRequest;
use App\Http\Requests\UpdaterequestRequest;
use App\Repositories\requestRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Exports\RequestExport;
use Maatwebsite\Excel\Facades\Excel;

class requestController extends AppBaseController
{
    /** @var  requestRepository */
    private $requestRepository;

    public function __construct(requestRepository $requestRepo)
    {
        $this->requestRepository = $requestRepo;
    }

    /**
     * Display a listing of the request.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $requests = $this->requestRepository->all();

        return view('requests.index')
            ->with('requests', $requests);
    }

    /**
     * Show the form for creating a new request.
     *
     * @return Response
     */
    public function create()
    {
        return view('requests.create');
    }

    /**
     * Store a newly created request in storage.
     *
     * @param CreaterequestRequest $request
     *
     * @return Response
     */
    public function store(CreaterequestRequest $request)
    {
        $input = $request->all();

        $request = $this->requestRepository->create($input);

        Flash::success('Request saved successfully.');

        return redirect(route('requests.index'));
    }

    /**
     * Display the specified request.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $request = $this->requestRepository->find($id);

        if (empty($request)) {
            Flash::error('Request not found');

            return redirect(route('requests.index'));
        }

        return view('requests.show')->with('request', $request);
    }

    /**
     * Show the form for editing the specified request.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $request = $this->requestRepository->find($id);

        if (empty($request)) {
            Flash::error('Request not found');

            return redirect(route('requests.index'));
        }

        return view('requests.edit')->with('request', $request);
    }

    /**
     * Update the specified request in storage.
     *
     * @param int $id
     * @param UpdaterequestRequest $request
     *
     * @return Response
     */
    public function update($id, UpdaterequestRequest $request)
    {
        $request = $this->requestRepository->find($id);

        if (empty($request)) {
            Flash::error('Request not found');

            return redirect(route('requests.index'));
        }

        $request = $this->requestRepository->update($request->all(), $id);

        Flash::success('Request updated successfully.');

        return redirect(route('requests.index'));
    }

    /**
     * Remove the specified request from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $request = $this->requestRepository->find($id);

        if (empty($request)) {
            Flash::error('Request not found');

            return redirect(route('requests.index'));
        }

        $this->requestRepository->delete($id);

        Flash::success('Request deleted successfully.');

        return redirect(route('requests.index'));
    }

    public function export_excel()
    {
        return Excel::download(new RequestExport, 'Request.xlsx');
    }
}
