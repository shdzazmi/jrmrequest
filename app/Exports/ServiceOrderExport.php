<?php

namespace App\Exports;

use App\Models\ListOrderAffari;
use App\Models\ListServiceOrder;
use App\Models\ListServiceOrderAffari;
use App\Models\Produk;
use App\Models\ListOrder;
use App\Models\Service;
use App\Models\ServiceOrder;
use App\Models\ServiceOrderAffari;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ServiceOrderExport implements FromView, WithStyles, ShouldAutoSize, WithColumnWidths
{
    public $services_orders;
    public $produks;
    public $services;
    public $listall;
    public $listorder;
    public $listjasa;
    public $totaldiscount;
    public $totalproduk;
    public $totaljasa;
    public $grandtotal;

    // Data server
    private string $server = '192.168.1.172\SQL2008';
    private string $database = 'JRM';
    private string $username = 'sa';
    private string $password = 'MasteR99';


    function __construct($uid) {

        if(substr($uid, 0, 1) === 'O'){
            $this->services_orders = ServiceOrderAffari::firstWhere('uid', $uid);
            $this->getListOrderAffari();
            $this->listorder = $this->listall->sortBy('nourut')->Where('type', '=','Part')->toArray();
            $this->listjasa = $this->listall->sortBy('nourut')->Where('type', '=','Service')->toArray();
            $this->totalproduk = $this->listall->sortBy('nourut')->Where('type', '=','Part')->sum('subtotal');
            $this->totaljasa = $this->listall->sortBy('nourut')->Where('type', '=','Service')->sum('subtotal');
        } else {
            $this->services_orders = ServiceOrder::firstWhere('uid', $uid);
            $this->listorder = ListServiceOrder::all()->where('uid', $uid);
            $this->listall = ListServiceOrder::all()->Where('uid', $uid);
            $this->listorder = ListServiceOrder::orderBy('nourut', 'ASC')->Where('uid', $uid)->Where('type', 'part')->get();
            $this->listjasa = ListServiceOrder::orderBy('nourut', 'ASC')->Where('uid', $uid)->Where('type', 'service')->get();
            $this->totalproduk = $this->listorder->sum('subtotal');
            $this->totaljasa = $this->listjasa->sum('subtotal');
        }
        $this->totaldiscount = $this->listall->sum('discount');
        $this->grandtotal = $this->totalproduk+$this->totaljasa;
        $this->produks = Produk::all();
        $this->services = Service::all();
//         $output = new \Symfony\Component\Console\Output\ConsoleOutput();
//         $output->writeln("listorder = $this->services_orders");
    }

    function getListOrderAffari(){
        $uid = $this->services_orders->uid;

        //Koneksi data server
        $sqlconnect = odbc_connect("Driver={SQL Server};Server=$this->server;Database=$this->database;", $this->username, $this->password);
        $sqlquery = "SELECT ";
        $sqlquery .= "NoTrans as uid, ";
        $sqlquery .= "NoUrut as nourut, ";
        $sqlquery .= "Tipe as type, ";
        $sqlquery .= "NamaBrg as ketnama, ";
        $sqlquery .= "stock.BarcodeAktif as barcode, ";
        $sqlquery .= "KodeBrg as bcodejasa, ";
        $sqlquery .= "ServiceOrderD.HJual + ServiceOrderD.Jasa as harga, ";
        $sqlquery .= "qty as qty, ";
        $sqlquery .= "jumlah as subtotal, ";
        $sqlquery .= "nDisc as discount ";
        $sqlquery .= "from ServiceOrderD ";
        $sqlquery .= "LEFT JOIN stock ON ServiceOrderD.IdItem = stock.id ";
        $sqlquery .= "WHERE NoTrans='$uid'";
        $process = odbc_exec($sqlconnect, $sqlquery);
        $this->listall = collect([]);
        while(odbc_fetch_row($process)) {
            $itemAll = [
                'uid' => utf8_encode(odbc_result($process, 'uid')),
                'nourut' => utf8_encode(odbc_result($process, 'nourut')),
                'ketnama' => utf8_encode(odbc_result($process, 'ketnama')),
                'type' => utf8_encode(odbc_result($process, 'type')),
                'barcode' => utf8_encode(odbc_result($process, 'barcode')),
                'bcodejasa' => utf8_encode(odbc_result($process, 'bcodejasa')),
                'harga' => floatval(odbc_result($process, 'harga')),
                'qty' => floatval(odbc_result($process, 'qty')),
                'subtotal' => floatval(odbc_result($process, 'subtotal')),
                'discount' => floatval(odbc_result($process, 'discount')),
                'keterangan' => '',
            ];
            $this->listall->push($itemAll);
        }
        odbc_close($sqlconnect);

        }

    /**
    * @return Collection
     * @var ServiceOrder $row
    */
    public function view(): View
    {
        return view('service_orders.export.services_orders_excel')
            ->with('serviceOrder', $this->services_orders)
            ->with('listorder', $this->listorder)
            ->with('listjasa', $this->listjasa)
            ->with('totaljasa', $this->totaljasa)
            ->with('totaldiscount', $this->totaldiscount)
            ->with('totalproduk', $this->totalproduk)
            ->with('grandtotal', $this->grandtotal)
            ->with('services', $this->services)
            ->with('produks', $this->produks);
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A:L')->getAlignment()->applyFromArray(array('vertical' => 'center'));
        $sheet->getStyle('A')->getAlignment()->applyFromArray(array('horizontal' => 'center'));
        $sheet->getStyle('B')->getAlignment()->applyFromArray(array('horizontal' => 'center'));
        $sheet->getStyle('I')->getAlignment()->applyFromArray(array('horizontal' => 'right'));
        $sheet->getStyle('J')->getAlignment()->applyFromArray(array('horizontal' => 'right'));
        $sheet->getStyle('K')->getAlignment()->applyFromArray(array('horizontal' => 'center'));
        $sheet->getStyle('L')->getAlignment()->applyFromArray(array('horizontal' => 'center'));
        $sheet->getStyle('2')->getAlignment()->applyFromArray(array('horizontal' => 'center'));
        $sheet->getStyle('1')->getAlignment()->applyFromArray(array('horizontal' => 'left'));
        $sheet->getStyle('C')->getAlignment()->setWrapText(true);
        $sheet->getStyle('F')->getAlignment()->setWrapText(true);
        $sheet->getStyle('G')->getAlignment()->setWrapText(true);
        $sheet->getStyle('H')->getAlignment()->setWrapText(true);
        $sheet->getStyle('2')->getAlignment()->setWrapText(true);
        $sheet->getStyle('I')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_ACCOUNTING);
        $sheet->getStyle('H')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_ACCOUNTING);
        $sheet->getStyle('D')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);
        $sheet->getStyle('E')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);

        return [
            // Style
            1    => ['font' => ['bold' => true]],
            2    => ['font' => ['bold' => true]],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 4,
            'B' => 8,
            'C' => 20,
            'D' => 15,
            'E' => 15,
            'F' => 20,
            'G' => 20,
            'H' => 15,
            'I' => 15,
            'J' => 8,
            'K' => 8,
            'L' => 8,
        ];
    }
}
