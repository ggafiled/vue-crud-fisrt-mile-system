<?php

namespace App\Imports;

<<<<<<< HEAD
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel
=======
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
>>>>>>> f28dfeb234c5cd294e6f813950d80e0eb81aadf3
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
<<<<<<< HEAD
            'name'  => $row[0],
            'email' => $row[1],
            'password' => Hash::make($row[2]),
        ]);
    }
}
=======
            'name'  => $row['name'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
        ]);
    }
}
>>>>>>> f28dfeb234c5cd294e6f813950d80e0eb81aadf3
