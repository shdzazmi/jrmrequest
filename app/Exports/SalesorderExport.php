<?php

namespace App\Exports;

use App\Models\SalesOrder;
use App\Models\ListOrder;
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
    public $uid;
    public $sales_orders;
    public $listorder;

    function __construct($id) {
        $this->id = $id;
        $this->sales_orders = SalesOrder::firstWhere('id', $this->id);
        $this->uid = $this->sales_orders->uid;
        $this->listorder = ListOrder::all()->where('uid', $this->uid);
        // $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        // $output->writeln("listorder = $this->listorder");

    }

    /**
    * @return \Illuminate\Support\Collection
     * @var SalesOrder $row
    */
    public function view(): View
    {
        return view('sales_orders.export.sales_orders_excel')
        ->with('salesOrder', $this->sales_orders)
        ->with('listorder', $this->listorder);
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A:J')->getAlignment()->applyFromArray(
            array('vertical' => 'center') //left,right,center & vertical
            );
        $sheet->getStyle('H')->getAlignment()->applyFromArray(
            array('horizontal' => 'center') //left,right,center & vertical
            );
        $sheet->getStyle('G')->getAlignment()->applyFromArray(
            array('horizontal' => 'right') //left,right,center & vertical
            );
        $sheet->getStyle('I')->getAlignment()->applyFromArray(
            array('horizontal' => 'right') //left,right,center & vertical
            );
        $sheet->getStyle('2')->getAlignment()->applyFromArray(
            array('horizontal' => 'center') //left,right,center & vertical
            );
        $sheet->getStyle('B')->getAlignment()->setWrapText(true);
        $sheet->getStyle('E')->getAlignment()->setWrapText(true);
        $sheet->getStyle('F')->getAlignment()->setWrapText(true);
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
            'B' => 15,
            'C' => 15,
            'D' => 15,
            'E' => 20,
            'F' => 15,
            'G' => 10,
            'H' => 5,
            'I' => 10,
            'J' => 10,
        ];
    }
}
