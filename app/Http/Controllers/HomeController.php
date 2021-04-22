<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\requestbarang;
use Carbon\Carbon;
use Flash;

class HomeController extends Controller
{

    // Data server
    private string $server = '192.168.1.172\SQL2008';
    private string $database = 'JRM';
    private string $username = 'sa';
    private string $password = 'MasteR99';

    public function __construct()
    {
        $this->middleware('auth');

        //Initialize data
        $produks = Produk::all();
        if ($produks->isEmpty()) {
            $this->fetchDataProduk();
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastupdate = Produk::first()->created_at;
        $time = \Carbon\Carbon::parse($lastupdate)->format('d-m-Y H:i:s');
        $requestdata = requestbarang::all();
        $requestcount = $requestdata->count();
        return view('home')
            ->with('time', $time)
            ->with('requestcount', $requestcount);
    }

    public function synchronize()
    {
        $this->fetchDataProduk();

        $lastupdate = Produk::first()->created_at;
        $time = \Carbon\Carbon::parse($lastupdate)->format('d-m-Y H:i:s');
        $requestdata = requestbarang::all();
        $requestcount = $requestdata->count();
        return redirect('/home')
            ->with('time', $time)
            ->with('requestcount', $requestcount);
    }

    public function fetchDataProduk(){

        //Koneksi data server
        $sqlconnect = odbc_connect("Driver={SQL Server};Server=$this->server;Database=$this->database;", $this->username, $this->password);

        $sqlquery = "SELECT ";
        $sqlquery .= "barcodeaktif AS barcode, ";
        $sqlquery .= "stock.nama AS nama, ";
        $sqlquery .= "hjual AS harga, ";
        $sqlquery .= "hjual2 AS harga2, ";
        $sqlquery .= "hjual3 AS harga3, ";
        $sqlquery .= "hmin AS hargamin, ";
        $sqlquery .= "supplier.namaalias AS supplier, ";
        $sqlquery .= "ukuran AS kendaraan, ";
        $sqlquery .= "lokasi1 AS lokasi1, ";
        $sqlquery .= "lokasi2 AS lokasi2, ";
        $sqlquery .= "lokasi3 AS lokasi3, ";
        $sqlquery .= "partno1 AS partno1, ";
        $sqlquery .= "partno2 AS partno2, ";
        $sqlquery .= "qtyAkhir + qtyGd AS qty, ";
        $sqlquery .= "subkategori AS subkategori ";
        $sqlquery .= "FROM stock ";
        $sqlquery .= "LEFT JOIN kelproduk ON stock.kelproduk = kelproduk.id ";
        $sqlquery .= "LEFT JOIN supplier ON stock.kodesupp = supplier.kode ";
        $sqlquery .= "WHERE (stock.status='Aktif' OR stock.status='Non Aktif'); ";

        $process = odbc_exec($sqlconnect, $sqlquery);
        $items = collect([]);
        while(odbc_fetch_row($process)) {
            $itemAll = [
                'barcode' => utf8_encode(odbc_result($process, 'barcode')),
                'nama' => utf8_encode(odbc_result($process, 'nama')),
                'kd_supplier' => utf8_encode(odbc_result($process, 'supplier')),
                'kendaraan' => utf8_encode(odbc_result($process, 'kendaraan')),
                'harga' => floatval(odbc_result($process, 'harga')),
                'harga2' => floatval(odbc_result($process, 'harga2')),
                'harga3' => floatval(odbc_result($process, 'harga3')),
                'hargamin' => floatval(odbc_result($process, 'hargamin')),
                'qty' => floatval(odbc_result($process, 'qty')),
                'lokasi1' => utf8_encode(odbc_result($process, 'lokasi1')),
                'lokasi2' => utf8_encode(odbc_result($process, 'lokasi2')),
                'lokasi3' => utf8_encode(odbc_result($process, 'lokasi3')),
                'partno1' => utf8_encode(odbc_result($process, 'partno1')),
                'partno2' => utf8_encode(odbc_result($process, 'partno2')),
                'subkategori' => utf8_encode(odbc_result($process, 'subkategori')),
                'created_at' => Carbon::now()->toDateTime(),
            ];
            $items->push($itemAll);
        }
        odbc_close($sqlconnect);
        if ($items->isEmpty()){
            Flash::error('Gagal sinkron data');
        } else {
            Produk::truncate();
            foreach (array_chunk($items->toArray(),1000)as $data)
            {
                Produk::insert($data);
            }
        }

    }
}
