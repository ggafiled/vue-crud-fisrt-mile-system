<?php
<<<<<<< HEAD
// UsersController
namespace App\Http\Controllers\API\V1;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends BaseController
{
=======

namespace App\Http\Controllers\API\V1;

use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
Use App\Models\Photo;

class UsersController   extends BaseController
{
    // function to store file in 'upload' folder
>>>>>>> f28dfeb234c5cd294e6f813950d80e0eb81aadf3
    public function import(Request $request)
    {
         $request->validate([
            'import_file' => 'required|file|mimes:xls,xlsx'
        ]);

        $path = $request->file('import_file');
        $data = Excel::import(new UsersImport, $path);

        return response()->json(['message' => 'uploaded successfully'], 200);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> f28dfeb234c5cd294e6f813950d80e0eb81aadf3
