<?php

namespace App\Http\Requests\Building;

use Illuminate\Foundation\Http\FormRequest;

class BuildingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('post')) {
            return $this->createRules();
        } elseif ($this->isMethod('put')) {
            return $this->updateRules();
        }
    }

    public function createRules(): array
    {
        return [
            'saleFm_id' => "numeric",
            'paymentType_id' => "numeric",
            'areas_id' => "numeric",
            'bbns_id' => "numeric",
            'area3bb_id' => "numeric",
            'areaTrue_id' => "numeric",
            'areaAis_id' => "numeric",
            'areaFibernet_id' => "numeric",
            'workTime_id' => "numeric",
            'projectName' => "string|max:191",
            'areaTrueNew' => "string|max:191",
            'buildingSum' => "string|max:191",
            'floorSum' => "string|max:191",
            'roomSum' => "string|max:191",
            'fmCode' => "string|max:191",
            'roadName' => "string|max:191",
            'nameManager' => "string|max:191",
            'phoneManager' => "string|max:191",
            'mailManager' => "string|max:191",
            'nameNiti' => "string|max:191",
            'phoneNiti' => "string|max:191",
            'mailNiti' => "string|max:191",
            'houseNumber' => "string|max:191",
            'squadNumber' => "string|max:191",
            'alleyName' => "string|max:191",
            'roadName' => "string|max:191",
            'districtName' => "string|max:191",
            'provinceName' => "string|max:191",
            'countyName' => "string|max:191",
            'postalCode' => "string|max:5|regex:/\b\d{5}\b/",
            'longitude' => ["regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/"],
            'latitude' => ["regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/"],
            'contractDate' => "date",
            'contractDateEnd' => "date",
            'condition' => "string|max:191",
            'contractPeriod' => "string|max:191",
            'reNewContact' => "string|max:191",
            'balance' => "numeric",
        ];
    }

    /**
     * Define validation rules to update method for resource update
     *
     * @return array
     */
    public function updateRules(): array
    {
        return [
            'saleFm_id' => "numeric",
            'paymentType_id' => "numeric",
            'areas_id' => "numeric",
            'bbns_id' => "numeric",
            'area3bb_id' => "numeric",
            'areaTrue_id' => "numeric",
            'areaAis_id' => "numeric",
            'areaFibernet_id' => "numeric",
            'workTime_id' => "numeric",
            'projectName' => "string|max:191",
            'areaTrueNew' => "string|max:191",
            'buildingSum' => "string|max:191",
            'floorSum' => "string|max:191",
            'roomSum' => "string|max:191",
            'fmCode' => "string|max:191",
            'roadName' => "string|max:191",
            'nameManager' => "string|max:191",
            'phoneManager' => "string|max:191",
            'mailManager' => "string|max:191",
            'nameNiti' => "string|max:191",
            'phoneNiti' => "string|max:191",
            'mailNiti' => "string|max:191",
            'houseNumber' => "string|max:191",
            'squadNumber' => "string|max:191",
            'alleyName' => "string|max:191",
            'roadName' => "string|max:191",
            'districtName' => "string|max:191",
            'provinceName' => "string|max:191",
            'countyName' => "string|max:191",
            'postalCode' => "string|max:5|regex:/\b\d{5}\b/",
            'longitude' => "digits",
            'latitude' => "digits",
            'contractDate' => "date",
            'contractDateEnd' => "date",
            'condition' => "string|max:191",
            'contractPeriod' => "string|max:191",
            'reNewContact' => "string|max:191",
            'balance' => "numeric",
        ];
    }
}
