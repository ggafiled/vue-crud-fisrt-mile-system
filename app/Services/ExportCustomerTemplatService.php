<?php

namespace App\Services;

use App\Models\Building;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use \PhpOffice\PhpSpreadsheet\IOFactory;

class ExportCustomerTemplatService
{

    public function __construct(){}

    public static function getCustomerTemplate()
    {
        $reader = IOFactory::createReader("Xlsx");
        $spreadsheet = $reader->load(storage_path("app/template/Customer-Template.xlsx"));
        $projectsheet = $spreadsheet->getSheetByName("RefProject");
        $worktsheet = $spreadsheet->getSheetByName("Work");
        $subprojectsheet = $spreadsheet->getSheetByName("RefSubProject");

        $building = Building::select("projectName", "id")->get()->toArray();
        $building_display_name = array_map(function ($item) {
            return $item["id"] . " # " . $item["projectName"];
        }, $building);

        $projectsheet->fromArray(
            array_chunk(array_column($building, "projectName"), 1), // The data to set
            null, // Array values with this value will not be set
            'B2' // Top left coordinate of the worksheet range where
        );
        $projectsheet->fromArray(
            array_chunk(array_column($building, "id"), 1), // The data to set
            null, // Array values with this value will not be set
            'C2' // Top left coordinate of the worksheet range where
        );
        $projectsheet->fromArray(
            array_chunk($building_display_name, 1), // The data to set
            null, // Array values with this value will not be set
            'A2' // Top left coordinate of the worksheet range where
        );
        $projectsheet->setCellValue("D2", Carbon::now());

        $worktsheet->setDataValidation(
            'F2:F10',
            (new DataValidation())
                ->setType(DataValidation::TYPE_LIST)
                ->setShowDropDown(true)
                ->setFormula1('=RefProject!$A$2:$A$' . (string) (count($building_display_name) + 1))
        );

        $worktsheet->setDataValidation(
            'G2:G10',
            (new DataValidation())
                ->setType(DataValidation::TYPE_LIST)
                ->setShowDropDown(true)
                ->setFormula1('=OFFSET(RefSubProject!$A$1,MATCH(F2,RefSubProject!$B:$B,0)-1,0,COUNTIFS(RefSubProject!$B:$B,F2),1)')
        );

        $worktsheet->setDataValidation(
            'J2:J10',
            (new DataValidation())
                ->setType(DataValidation::TYPE_LIST)
                ->setShowDropDown(true)
                ->setFormula1('=Data_Validation_For_Zone!$J$2:$J$8')
        );

        $worktsheet->setDataValidation(
            'K2:K10',
            (new DataValidation())
                ->setType(DataValidation::TYPE_LIST)
                ->setShowDropDown(true)
                ->setFormula1('=Data_Validation_For_Zone!$K$2:$K$25')
        );

        $worktsheet->setDataValidation(
            'K2:K10',
            (new DataValidation())
                ->setType(DataValidation::TYPE_LIST)
                ->setShowDropDown(true)
                ->setFormula1('=Data_Validation_For_Zone!$K$2:$K$25')
        );

        $worktsheet->setDataValidation(
            'N2:N10',
            (new DataValidation())
                ->setType(DataValidation::TYPE_LIST)
                ->setShowDropDown(true)
                ->setFormula1('=Data_Validation_For_Zone!$L$2:$L$8')
        );

        $worktsheet->setDataValidation(
            'Q2:Q10',
            (new DataValidation())
                ->setType(DataValidation::TYPE_LIST)
                ->setShowDropDown(true)
                ->setFormula1('=Data_Validation_For_Zone!$I$2:$I$9')
        );

        $worktsheet->setDataValidation(
            'R2:R10',
            (new DataValidation())
                ->setType(DataValidation::TYPE_LIST)
                ->setShowDropDown(true)
                ->setFormula1('=Data_Validation_For_Zone!$J$2:$J$8')
        );

        $worktsheet->setDataValidation(
            'S2:S10',
            (new DataValidation())
                ->setType(DataValidation::TYPE_LIST)
                ->setShowDropDown(true)
                ->setFormula1('=Data_Validation_For_Zone!$F$2:$F$6')
        );

        $writer = IOFactory::createWriter($spreadsheet, "Xlsx");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Customer-Template.xlsx"');

        $writer->save("php://output");
    }
}