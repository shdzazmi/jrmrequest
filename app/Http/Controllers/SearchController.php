<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Carbon\Carbon;

class SearchController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Produk::all();

        return view('search_produk.index')->with('produks', $items);
    }

    public function data()
    {
        return datatables()->of(Produk::all())
            ->addColumn('simple', 'search_produk.tablecol.simple')
            ->rawColumns(['simple'])
            ->make(true);
    }
}
