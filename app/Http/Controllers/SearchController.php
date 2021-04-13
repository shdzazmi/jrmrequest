<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Carbon\Carbon;
use Flash;

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
        //Koneksi data server
        if(request()->ajax()) {
                $sqlconnect = odbc_connect("Driver={SQL Server};Server=$this->server;Database=$this->database;", $this->username, $this->password);
                $sqlquery = "select top 1000 * from stock where Status='Aktif';"; //limit cuma 100 data (top 100)
                $process = odbc_exec($sqlconnect, $sqlquery);
                $items = collect([]);
                while (odbc_fetch_row($process)) {
                    $itemAll = [
                        'nama' => utf8_encode(odbc_result($process, 'Nama')),
                        'barcode' => utf8_encode(odbc_result($process, 'BarcodeAktif')),
                        'kd_supplier' => utf8_encode(odbc_result($process, 'KodeSupp')),
                        'kendaraan' => utf8_encode(odbc_result($process, 'Ukuran')),
                        'part_number' => utf8_encode(odbc_result($process, 'PartNo1')),
                        'lokasi' => utf8_encode(odbc_result($process, 'Lokasi1')),
                        'harga' => floatval(odbc_result($process, 'HJual')),
                        'qty' => floatval(odbc_result($process, 'qtyAkhir')),
                        'created_at' => Carbon::now()->toDateTime(),
                    ];
                    foreach (array_chunk($itemAll,1000)as $data)
                    {
                        $items->push($data);
                    }
//                $items->push($itemAll);
                }
                odbc_close($sqlconnect);

                return datatables()->of($items)
                    ->make(true);


        }
        return view('search_produk.index');
    }

}
