<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

//    Data server
    private $server = '192.168.1.172';
    private $database = 'JRM';
    private $username = 'sa';
    private $password = 'acuan';

    public function __construct()
    {
        $this->middleware('auth');

        //Koneksi data server
        $produks = Produk::all();
        if ($produks->isEmpty()) {
            setlocale(LC_TIME, 'id');
            $sqlconnect = odbc_connect("Driver={SQL Server};Server=$this->server;Database=$this->database;", $this->username, $this->password);
            $sqlquery = "select top 100 * from stock where Status='Aktif' ;"; //limit cuma 100 data
            $process = odbc_exec($sqlconnect, $sqlquery);
            $items = collect([]);
            while(odbc_fetch_row($process)) {
                $itemAll = [
                    'nama' => utf8_encode(odbc_result($process, 'Nama')),
                    'kendaraan' => utf8_encode(odbc_result($process, 'Ukuran')),
                    'part_number' => utf8_encode(odbc_result($process, 'PartNo1')),
                ];
                $items->push($itemAll);
            }
            odbc_close($sqlconnect);
            DB::table('Produks')->insert($items->toArray());
        }

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function synchronize()
    {
        DB::table('Produks')->delete();
        $produks = Produk::all();
        if ($produks->isEmpty()) {
            setlocale(LC_TIME, 'id');
            $sqlconnect = odbc_connect("Driver={SQL Server};Server=$this->server;Database=$this->database;", $this->username, $this->password);
            $sqlquery = "select top 100 * from stock where Status='Aktif' ;"; //limit cuma 100 data
            $process = odbc_exec($sqlconnect, $sqlquery);
            $items = collect([]);
            while(odbc_fetch_row($process)) {
                $itemAll = [
                    'nama' => utf8_encode(odbc_result($process, 'Nama')),
                    'kendaraan' => utf8_encode(odbc_result($process, 'Ukuran')),
                    'part_number' => utf8_encode(odbc_result($process, 'PartNo1')),
                ];
                $items->push($itemAll);
            }
            odbc_close($sqlconnect);
            DB::table('Produks')->insert($items->toArray());
        }
        return view('home');
    }
}
