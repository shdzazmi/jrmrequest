<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class LocationController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = collect([]);
        return view('location.index')->with('items', $items);
    }

    public function update($col, $barcode, Request $request)
    {
        $sqlconnect = odbc_connect("Driver={SQL Server};Server=$this->server;Database=$this->database;", $this->username, $this->password);
        $sqlquery = "UPDATE stock SET $col='$request->lokasi1' WHERE BarcodeAktif='$barcode';";
        odbc_exec($sqlconnect, $sqlquery);
        odbc_close($sqlconnect);

        return Response::json();
    }

    public function edit($barcode)
    {
        $sqlconnect = odbc_connect("Driver={SQL Server};Server=$this->server;Database=$this->database;", $this->username, $this->password);
        $sqlquery = "SELECT Lokasi1, Lokasi2, Lokasi3 FROM stock WHERE BarcodeAktif='$barcode';";
        $process = odbc_exec($sqlconnect, $sqlquery);
        $items = collect([]);
        while (odbc_fetch_row($process)) {
            $itemAll = [
                'lokasi1' => utf8_encode(odbc_result($process, 'Lokasi1')),
                'lokasi2' => utf8_encode(odbc_result($process, 'Lokasi2')),
                'lokasi3' => utf8_encode(odbc_result($process, 'Lokasi3')),
            ];
            $items->push($itemAll);
        }
        odbc_close($sqlconnect);

        return Response::json($items);
    }

    public function search($barcode)
    {
        $barcodeFull = "01/$barcode";
        $sqlconnect = odbc_connect("Driver={SQL Server};Server=$this->server;Database=$this->database;", $this->username, $this->password);
        $sqlquery = "SELECT * FROM stock WHERE BarcodeAktif='$barcodeFull';";
        $process = odbc_exec($sqlconnect, $sqlquery);
        $items = collect([]);
        while (odbc_fetch_row($process)) {
            $itemAll = [
                'nama' => utf8_encode(odbc_result($process, 'Nama')),
                'barcode' => utf8_encode(odbc_result($process, 'BarcodeAktif')),
                'kendaraan' => utf8_encode(odbc_result($process, 'Ukuran')),
                'lokasi1' => utf8_encode(odbc_result($process, 'Lokasi1')),
                'lokasi2' => utf8_encode(odbc_result($process, 'Lokasi2')),
                'lokasi3' => utf8_encode(odbc_result($process, 'Lokasi3')),
            ];
            $items->push($itemAll);
        }
        odbc_close($sqlconnect);

        if (!$items->isEmpty()){
             return view('location.index')
                ->with('items', $items);
        } else {
            return view('location.index')
            ->with('items', $items);
        }

    }

}
