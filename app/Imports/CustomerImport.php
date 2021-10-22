<?php

namespace App\Imports;

use App\Models\Planing;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class CustomerImport implements ToModel
{

    use Importable;
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        //
    }
}