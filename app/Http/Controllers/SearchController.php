<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Carbon\Carbon;

class SearchController extends Controller
{

//    Data server
    private $server = '192.168.1.172\SQL2008';
    private $database = 'JRM';
    private $username = 'sa';
    private $password = 'MasteR99';

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     *
     * Show the application dashboard.
     *
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Produk::all();

        //Koneksi data server
        if(request()->ajax()) {


                return datatables()->of($items)
                    ->make(true);


        }
        return view('search_produk.index')->with('produks', $items);
    }

}
