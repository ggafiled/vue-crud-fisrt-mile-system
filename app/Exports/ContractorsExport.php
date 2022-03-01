<?php

namespace App\Exports;

use App\Models\Contractor;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContractorsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Contractor::all();
    }
}
