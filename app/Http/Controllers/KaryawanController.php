<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatekaryawanRequest;
use App\Http\Requests\UpdatekaryawanRequest;
use App\Models\User;
use App\Repositories\karyawanRepository;
use App\Http\Controllers\AppBaseController;
use Exception;
use Illuminate\Http\Request;
use Flash;
use Response;

class KaryawanController extends AppBaseController
{
    /** @var  karyawanRepository */
    private $karyawanRepository;

    public function __construct(karyawanRepository $karyawanRepo)
    {
        $this->karyawanRepository = $karyawanRepo;
    }

    /**
     * Display a listing of the karyawan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $karyawans = $this->karyawanRepository->paginate(25);

        return view('karyawans.index')
            ->with('karyawans', $karyawans);
    }

    /**
     * Show the form for creating a new karyawan.
     *
     * @return Response
     */
    public function create()
    {
        return view('karyawans.create');
    }

    /**
     * Store a newly created karyawan in storage.
     *
     * @param CreatekaryawanRequest $request
     *
     * @return Response
     */
    public function store(CreatekaryawanRequest $request)
    {
        $input = $request->all();


        $karyawan = $this->karyawanRepository->create($input);

        Flash::success('Karyawan saved successfully.');

        $userall = User::all();
        $karyawans = $this->karyawanRepository->all();
        return redirect('admin')->with('user', $userall)->with('karyawans', $karyawans);
    }

    /**
     * Display the specified karyawan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $karyawan = $this->karyawanRepository->find($id);

        if (empty($karyawan)) {
            Flash::error('Karyawan not found');

            $userall = User::all();
            $karyawans = $this->karyawanRepository->all();
            return redirect('admin')->with('user', $userall)->with('karyawans', $karyawans);
        }

        return view('karyawans.show')->with('karyawan', $karyawan);
    }

    /**
     * Show the form for editing the specified karyawan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $karyawan = $this->karyawanRepository->find($id);

        if (empty($karyawan)) {
            Flash::error('Karyawan not found');

            $userall = User::all();
            $karyawans = $this->karyawanRepository->all();
            return redirect('admin')->with('user', $userall)->with('karyawans', $karyawans);
        }

        return view('karyawans.edit')->with('karyawan', $karyawan);
    }

    /**
     * Update the specified karyawan in storage.
     *
     * @param int $id
     * @param UpdatekaryawanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekaryawanRequest $request)
    {
        $karyawan = $this->karyawanRepository->find($id);
        $userall = User::all();
        $karyawans = $this->karyawanRepository->all();

        if (empty($karyawan)) {
            Flash::error('Karyawan not found');


            return redirect('admin')->with('user', $userall)->with('karyawans', $karyawans);
        }

        $karyawan = $this->karyawanRepository->update($request->all(), $id);

        Flash::success('Karyawan updated successfully.');

        return redirect('admin')->with('user', $userall)->with('karyawans', $karyawans);
    }

    /**
     * Remove the specified karyawan from storage.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $karyawan = $this->karyawanRepository->find($id);
        $userall = User::all();
        $karyawans = $this->karyawanRepository->all();

        if (empty($karyawan)) {
            Flash::error('Karyawan not found');

            return redirect('admin')->with('user', $userall)->with('karyawans', $karyawans);
        }

        $this->karyawanRepository->delete($id);

        Flash::success('Karyawan deleted successfully.');

        return redirect('admin')->with('user', $userall)->with('karyawans', $karyawans);
    }
}
