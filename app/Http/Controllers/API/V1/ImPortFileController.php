<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController;
use App\Services\ImportCustomerTemplateService;
use Exception;
use Illuminate\Http\Request;

class ImPortFileController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getInfo(Request $request)
    {
        try {
            return $this->sendResponse(["sheetNames" => ImportCustomerTemplateService::getTemplateInfo($request->file("file"))], trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError([], $ex->getMessage());
        }
    }
}