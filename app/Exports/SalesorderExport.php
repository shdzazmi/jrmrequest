<?php

namespace App\Exports;

use App\Models\ListOrderAffari;
use App\Models\Produk;
use App\Models\SalesOrder;
use App\Models\ListOrder;
use App\Models\SalesOrderAffari;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class SalesorderExport implements FromView, WithStyles, ShouldAutoSize, WithColumnWidths
{
    public $sales_orders;
    public $listorder;
    public $totalharga;
    public $produks;

    function __construct($uid) {
        if(substr($uid, 0, 1) === 'S'){
            $this->sales_orders = SalesOrderAffari::firstWhere('uid', $uid);
            $this->listorder = ListOrderAffari::all()->where('uid', $uid);
        } else {
            $this->sales_orders = SalesOrder::firstWhere('uid', $uid);
            $this->listorder = ListOrder::all()->where('uid', $uid);
        }
        $this->totalharga = $this->listorder->sum('subtotal');
        $this->produks = Produk::all();
//         $output = new \Symfony\Component\Console\Output\ConsoleOutput();
//         $output->writeln("listorder = $this->sales_orders");
    }

    /**
    * @return \Illuminate\Support\Collection
     * @var SalesOrder $row
    */
    public function view(): View
    {
        return view('sales_orders.export.sales_orders_excel')
            ->with('salesOrder', $this->sales_orders)
            ->with('listorder', $this->listorder)
            ->with('totalharga', $this->totalharga)
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
        $sheet->getStyle('I')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_ACCOUNTING);
        $sheet->getStyle('J')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_ACCOUNTING);
        $sheet->getStyle('D')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
        $sheet->getStyle('E')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);

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
            'H' => 10,
            'I' => 15,
            'J' => 15,
            'K' => 8,
            'L' => 8,
        ];
    }
}
