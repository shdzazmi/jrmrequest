<?php

namespace App\Exports;

use App\Models\requestbarang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RequestbarangExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
     * @var requestbarang $row
    */
    public function collection()
    {
        return Requestbarang::all();
    }

    public function headings(): array
    {
        return [
            ['REQUEST ITEM KOSONG'],
            [],
            ['No', 'Tanggal', 'Nama produk', 'Barcode', 'Kode supplier', 'Kendaraan', 'Part number', 'Keterangan', 'Request by', 'Created_at', 'Updated_at']
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style
            1    => ['font' => ['bold' => true, 'size' => 16]],
        ];
    }


    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 10,
            'C' => 15,
            'D' => 15,
            'E' => 15,
            'F' => 15,
            'G' => 15,
            'H' => 15,
            'I' => 15,
            'J' => 15,
        ];
    }
}
