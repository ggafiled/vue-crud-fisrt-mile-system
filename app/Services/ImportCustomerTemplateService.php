<?php

namespace App\Services;

use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use \PhpOffice\PhpSpreadsheet\IOFactory;

class ImportCustomerTemplateService
{

    public function __construct(){}

    public static function getTemplateInfo($file)
    {
        $reader = IOFactory::createReader("Xlsx");
        $spreadsheet = $reader->load($file);
        return $spreadsheet->getSheetNames();
    }

}