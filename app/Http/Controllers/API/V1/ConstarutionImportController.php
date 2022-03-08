<?php
namespace App\Http\Controllers\API\V1;
use App\Imports\ConstarutionsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConstarutionImportController extends BaseController
{
    public function import(Request $request)
    {
         $request->validate([
            'import_file' => 'required|file|mimes:xls,xlsx'
        ]);

        $path = $request->file('import_file');
        $data = Excel::import(new ConstarutionsImport, $path);

        return response()->json(['message' => 'uploaded successfully'], 200);
    }

}

