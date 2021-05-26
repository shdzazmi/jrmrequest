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

class SalesOrderDashboardExport implements FromView, WithStyles, ShouldAutoSize, WithColumnWidths
{
    public $sales_orders;

    function __construct() {
        $this->sales_orders = SalesOrder::All();
        // $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        // $output->writeln("listorder = $this->listorder");
    }

    /**
     * @return \Illuminate\Support\Collection
     * @var SalesOrder $row
     */
    public function view(): View
    {
        return view('sales_orders.export.sales_orders_dashboard_excel')
            ->with('salesOrder', $this->sales_orders);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function columnWidths(): array
    {
        return [

        ];
    }
}
