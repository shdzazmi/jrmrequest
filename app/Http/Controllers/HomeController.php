<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\requestbarang;
use Carbon\Carbon;
use Facade\FlareClient\Http\Response;
use Flash;

class HomeController extends Controller
{

//    Data server
    private $server = '192.168.1.172\SQL2008';
    private $database = 'JRM';
    private $username = 'sa';
    private $password = 'MasteR99';

    public function __construct()
    {
        $this->middleware('auth');

        //Koneksi data server
        $produks = Produk::all();
        if ($produks->isEmpty()) {
            $sqlconnect = odbc_connect("Driver={SQL Server};Server=$this->server;Database=$this->database;", $this->username, $this->password);
            $sqlquery = "select top 1000 * from stock where Status='Aktif' ;"; //limit cuma 100 data (top 100)
            $process = odbc_exec($sqlconnect, $sqlquery);
            $items = collect([]);
            while(odbc_fetch_row($process)) {
                $itemAll = [
                    'nama' => utf8_encode(odbc_result($process, 'Nama')),
                    'barcode' => utf8_encode(odbc_result($process, 'BarcodeAktif')),
                    'kd_supplier' => utf8_encode(odbc_result($process, 'KodeSupp')),
                    'kendaraan' => utf8_encode(odbc_result($process, 'Ukuran')),
                    'part_number' => utf8_encode(odbc_result($process, 'PartNo1')),
                    'lokasi' => utf8_encode(odbc_result($process, 'Lokasi1')),
                    'harga' => utf8_encode(odbc_result($process, 'HJual')),
                    'created_at' => Carbon::now()->toDateTime(),
                ];
                $items->push($itemAll);
            }
            odbc_close($sqlconnect);
            if (!$items->isEmpty()){
                foreach (array_chunk($items->toArray(),1000)as $data)
                {
                    Produk::insert($data);
                }
            }
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
        $sqlconnect = odbc_connect("Driver={SQL Server};Server=$this->server;Database=$this->database;", $this->username, $this->password);
        $sqlquery = "select top 1000 * from stock where Status='Aktif' ;"; //limit cuma 50 data (top 50)
        $process = odbc_exec($sqlconnect, $sqlquery);
        $items = collect([]);
        while(odbc_fetch_row($process)) {
            $itemAll = [
                'nama' => utf8_encode(odbc_result($process, 'Nama')),
                'barcode' => utf8_encode(odbc_result($process, 'BarcodeAktif')),
                'kd_supplier' => utf8_encode(odbc_result($process, 'KodeSupp')),
                'kendaraan' => utf8_encode(odbc_result($process, 'Ukuran')),
                'part_number' => utf8_encode(odbc_result($process, 'PartNo1')),
                'lokasi' => utf8_encode(odbc_result($process, 'Lokasi1')),
                'harga' => utf8_encode(odbc_result($process, 'HJual')),
                'created_at' => \Carbon\Carbon::now()->toDateTime(),
            ];
            $items->push($itemAll);
        }
        odbc_close($sqlconnect);
        if ($items->isEmpty()){
            Flash::error('Gagal sinkron data');
            return Response::json();
        } else {
            Produk::truncate();
            foreach (array_chunk($items->toArray(),1000)as $data)
            {
                Produk::insert($data);
            }
            return Response::json();
        }

        $lastupdate = Produk::first()->created_at;
        $time = \Carbon\Carbon::parse($lastupdate)->format('d-m-Y H:i:s');
        $requestdata = requestbarang::all();
        $requestcount = $requestdata->count();
        return redirect('/home')
            ->with('time', $time)
            ->with('requestcount', $requestcount);
    }
}
