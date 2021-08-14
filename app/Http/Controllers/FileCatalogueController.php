<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFileCatalogueRequest;
use App\Http\Requests\UpdateFileCatalogueRequest;
use App\Models\FileCatalogue;
use App\Models\ProdukCatalogue;
use App\Repositories\FileCatalogueRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FileCatalogueController extends AppBaseController
{
    /** @var  FileCatalogueRepository */
    private $fileCatalogueRepository;

    public function __construct(FileCatalogueRepository $fileCatalogueRepo)
    {
        $this->fileCatalogueRepository = $fileCatalogueRepo;
    }

    /**
     * Display a listing of the FileCatalogue.
     *
     * @param Request $request
     *
     */
    public function index(Request $request)
    {
        $fileCatalogues = FileCatalogue::orderBy('Nama', 'ASC')->Where('kategori', null)->get();

        return view('file_catalogues.index')
            ->with('fileCatalogues', $fileCatalogues);
    }

    public function index_genuine(Request $request)
    {
        return view('file_catalogues_genuine.index');
    }

    public function index_daihatsu(Request $request)
    {
        $fileCatalogues = FileCatalogue::orderBy('Nama', 'ASC')->Where('kategori', 'daihatsu')->get();

        return view('file_catalogues.index_daihatsu')
            ->with('fileCatalogues', $fileCatalogues);
    }

    public function index_isuzu(Request $request)
    {
        $fileCatalogues = FileCatalogue::orderBy('Nama', 'ASC')->Where('kategori', 'isuzu')->get();

        return view('file_catalogues.index_isuzu')
            ->with('fileCatalogues', $fileCatalogues);
    }

    public function index_excel(Request $request)
    {
        return view('file_catalogues.index_excel');
    }

    /**
     * Show the form for creating a new FileCatalogue.
     *
     */
    public function create()
    {
        return view('file_catalogues.create');
    }

    /**
     * Store a newly created FileCatalogue in storage.
     *
     * @param CreateFileCatalogueRequest $request
     *
     */

    public function store(Request $req)
    {
        $req->validate([
            'file' => 'mimes:pdf|max:100048',
            'cover' => 'mimes:jpg,jpeg,png|max:100048'
        ]);

        $fileModel = new FileCatalogue;

        if($req->file('file_path')) {
            $fileName = $req->file_path->getClientOriginalName();
            $coverName = $req->cover_path->getClientOriginalName();
            $filePath = $req->file('file_path')->storeAs('uploads', $fileName, 'public');
            $coverPath = $req->file('cover_path')->storeAs('cover', $coverName, 'public');

            $fileModel->Nama = $req->Nama;
            $fileModel->file_path = '/jrm/storage/app/public/' . $filePath.'#toolbar=0&navpanes=0&scrollbar=0d';
            $fileModel->cover_path = '/jrm/storage/app/public/' . $coverPath.'#toolbar=0&navpanes=0&scrollbar=0d';
            $fileModel->save();
            Flash::success('File Catalogue saved successfully.');

            return redirect(route('fileCatalogues.index'));
        }
        Flash::error('File Catalogue error.');
        return redirect(route('fileCatalogues.index'));

    }

    /**
     * Update the specified FileCatalogue in storage.
     *
     * @param int $id
     * @param UpdateFileCatalogueRequest $request
     *
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'cover' => 'mimes:jpg,jpeg,png|max:100048'
        ]);

        $fileCatalogue = $this->fileCatalogueRepository->find($id);

        if (empty($fileCatalogue)) {
            Flash::error('File Catalogue not found');
            return redirect(route('fileCatalogues.index'));
        }

        $fileCatalogue->Nama = $request->Nama;
        $fileCatalogue->kategori = $request->kategori;

        if($request->file('cover_path')) {
            $coverName = $request->cover_path->getClientOriginalName();
            $coverPath = $request->file('cover_path')->storeAs('cover', $coverName, 'public');

            $fileCatalogue->cover_path = '/jrm/storage/app/public/' . $coverPath.'#toolbar=0&navpanes=0&scrollbar=0d';
        }
        $fileCatalogue->save();

        Flash::success('File Catalogue updated successfully.');

        return redirect(route('fileCatalogues.index'));
    }

    /**
     * Display the specified FileCatalogue.
     *
     * @param int $id
     *
     */

    public function show($id)
    {
        $fileCatalogue = $this->fileCatalogueRepository->find($id);

        if (empty($fileCatalogue)) {
            Flash::error('File Catalogue not found');

            return redirect(route('fileCatalogues.index'));
        }

        return view('file_catalogues.show')->with('fileCatalogue', $fileCatalogue);
    }

    /**
     * Show the form for editing the specified FileCatalogue.
     *
     * @param int $id
     *
     */
    public function edit($id)
    {
        $fileCatalogue = $this->fileCatalogueRepository->find($id);

        if (empty($fileCatalogue)) {
            Flash::error('File Catalogue not found');

            return redirect(route('fileCatalogues.index'));
        }

        return view('file_catalogues.edit')->with('fileCatalogue', $fileCatalogue);
    }

    public function destroy($id)
    {
        $fileCatalogue = $this->fileCatalogueRepository->find($id);

        if (empty($fileCatalogue)) {
            Flash::error('File Catalogue not found');

            return redirect(route('fileCatalogues.index'));
        }

        $this->fileCatalogueRepository->delete($id);

        Flash::success('File Catalogue deleted successfully.');

        return redirect(route('fileCatalogues.index'));
    }

}
