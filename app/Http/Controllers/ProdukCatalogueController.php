<?php

namespace App\Http\Controllers;

use App\Models\ListOrder;
use App\Models\ProdukCatalogue;
use App\Models\ProdukDaihatsu;
use App\Models\ProdukFord;
use App\Models\ProdukHino;
use App\Models\ProdukHonda;
use App\Models\ProdukIsuzu;
use App\Models\ProdukMitsubishi;
use App\Models\ProdukSuzuki;
use App\Models\ProdukToyota;
use App\Repositories\ListOrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukCatalogueController extends AppBaseController
{
    private array $auth = array('Master', 'Dev', 'Admin');

    public function __construct(ListOrderRepository $ListOrderRepo)
    {
    }

    public function data()
    {
        return datatables()->of(ProdukCatalogue::select('*'))
            ->make(true);
    }

    public function dataDaihatsu()
    {
        return datatables()->of(ProdukDaihatsu::select('*'))
            ->make(true);
    }

    public function dataFord()
    {
        return datatables()->of(ProdukFord::select('*'))
            ->make(true);
    }

    public function dataHino()
    {
        return datatables()->of(ProdukHino::select('*'))
            ->make(true);
    }

    public function dataHonda()
    {
        return datatables()->of(ProdukHonda::select('*'))
            ->make(true);
    }

    public function dataIsuzu()
    {
        return datatables()->of(ProdukIsuzu::select('*'))
            ->make(true);
    }

    public function dataMitsubishi()
    {
        return datatables()->of(ProdukMitsubishi::select('*'))
            ->make(true);
    }

    public function dataSuzuki()
    {
        return datatables()->of(ProdukSuzuki::select('*'))
            ->make(true);
    }

    public function dataToyota()
    {
        return datatables()->of(ProdukToyota::select('*'))
            ->make(true);
    }

}
