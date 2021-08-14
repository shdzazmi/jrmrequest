<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Redirect,Response;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class LocationController extends Controller
{
//    Data server
    private string $server = '192.168.1.172\SQL2008';
    private string $database = 'JRM';
    private string $username = 'sa';
    private string $password = 'MasteR99';
    private array $auth = array('Master', 'Head', 'Dev', 'Admin');

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
        if (in_array(Auth::user()->role, $this->auth))
        {
            $items = collect([]);
            return view('location.index')->with('items', $items);
        } else {
            return redirect('home');
        }
    }

    public function index_denah()
    {
        if (in_array(Auth::user()->role, $this->auth))
        {
            return view('location.index_denah');
        } else {
            return redirect('home');
        }
    }

    public function store(Request $request)
    {
        $sqlconnect = odbc_connect("Driver={SQL Server};Server=$this->server;Database=$this->database;", $this->username, $this->password);
        $sqlqueryUpdateLok1 = "UPDATE stock SET Lokasi1='$request->lokasi1' WHERE BarcodeAktif='$request->barcode';";
        odbc_exec($sqlconnect, $sqlqueryUpdateLok1);
        $sqlqueryUpdateLok2 = "UPDATE stock SET Lokasi2='$request->lokasi2' WHERE BarcodeAktif='$request->barcode';";
        odbc_exec($sqlconnect, $sqlqueryUpdateLok2);
        $sqlqueryUpdateLok3 = "UPDATE stock SET Lokasi3='$request->lokasi3' WHERE BarcodeAktif='$request->barcode';";
        odbc_exec($sqlconnect, $sqlqueryUpdateLok3);
        odbc_close($sqlconnect);
        return Redirect::back();
    }

    public function update($barcode, $lokasi)
    {
        $bcode = "$barcode";
        $sqlconnect = odbc_connect("Driver={SQL Server};Server=$this->server;Database=$this->database;", $this->username, $this->password);
        $sqlqueryselect = "SELECT * FROM stock WHERE BarcodeAktif='$bcode'";
        $process = odbc_exec($sqlconnect, $sqlqueryselect);
        $lokasi1 = utf8_encode(odbc_result($process, 'Lokasi1'));
        $lokasi2 = utf8_encode(odbc_result($process, 'Lokasi2'));
        $lokasi3 = utf8_encode(odbc_result($process, 'Lokasi3'));
        if (odbc_num_rows($process)!=0) {
            if ($lokasi1 == ""){
                $sqlqueryupdate = "UPDATE stock SET Lokasi1='$lokasi' WHERE BarcodeAktif='$bcode';";
                odbc_exec($sqlconnect, $sqlqueryupdate);
            }
            else if ($lokasi2 == ""){
                $sqlqueryupdate = "UPDATE stock SET Lokasi2='$lokasi' WHERE BarcodeAktif='$bcode';";
                odbc_exec($sqlconnect, $sqlqueryupdate);
            }
            else if ($lokasi3 == ""){
                $sqlqueryupdate = "UPDATE stock SET Lokasi3='$lokasi' WHERE BarcodeAktif='$bcode';";
                odbc_exec($sqlconnect, $sqlqueryupdate);
            }
            else {
                $sqlqueryupdate = "UPDATE stock SET Lokasi1='$lokasi' WHERE BarcodeAktif='$bcode';";
                odbc_exec($sqlconnect, $sqlqueryupdate);
            }
        }

//        cek debug
//        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
//        $output->writeln("Lokasi 1 = $lokasi1");

        odbc_close($sqlconnect);
        return Response::json();
    }

    public function edit($barcode)
    {
        $sqlconnect = odbc_connect("Driver={SQL Server};Server=$this->server;Database=$this->database;", $this->username, $this->password);
        $sqlquery = "SELECT Lokasi1, Lokasi2, Lokasi3 FROM stock WHERE BarcodeAktif='$barcode';";
        $process = odbc_exec($sqlconnect, $sqlquery);
        $items = [
            'lokasi1' => utf8_encode(odbc_result($process, 'Lokasi1')),
            'lokasi2' => utf8_encode(odbc_result($process, 'Lokasi2')),
            'lokasi3' => utf8_encode(odbc_result($process, 'Lokasi3')),
        ];
        odbc_close($sqlconnect);
        return $items;
    }

    public function search($barcode)
    {
        $sqlconnect = odbc_connect("Driver={SQL Server};Server=$this->server;Database=$this->database;", $this->username, $this->password);
        $sqlquery = "SELECT * FROM stock WHERE BarcodeAktif LIKE '%$barcode%';";
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

        return view('location.index')
            ->with('items', $items);
    }

    public function searchs($lokasi)
    {
        $sqlconnect = odbc_connect("Driver={SQL Server};Server=$this->server;Database=$this->database;", $this->username, $this->password);
        $sqlquery = "SELECT * FROM stock WHERE Lokasi1 LIKE '%$lokasi%' OR  Lokasi2 LIKE '%$lokasi%' OR  Lokasi3 LIKE '%$lokasi%';";
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

        return view('location.index')
            ->with('items', $items);
    }

    public function putItem($barcode)
    {
        $bcode = "$barcode";
        $produk = Produk::where('barcode', $bcode)->first();
        return $produk ;
    }



}
