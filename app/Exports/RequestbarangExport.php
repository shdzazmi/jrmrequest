<?php

namespace App\Exports;

use App\Models\requestbarang;
use Maatwebsite\Excel\Concerns\FromCollection;

class RequestbarangExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Requestbarang::all();
    }
}
