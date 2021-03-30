<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function store(Request $request){
        // validation goes here
        $produk = Produk::create($request->all());
        return $produk;
    }
    public function get(){
        $produk = Produk::all();
        //if you want to get contacts on where condition use below code
        //$contacts = Contact::Where('tenant_id', "1")->get();
        return view('produks', $produk);
    }
}
