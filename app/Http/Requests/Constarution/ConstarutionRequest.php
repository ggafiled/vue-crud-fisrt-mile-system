<?php

namespace App\Http\Requests\Constarution;

use Illuminate\Foundation\Http\FormRequest;

class ConstarutionRequest extends FormRequest
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
            'building_id' => "required|numeric",
            'projectNameTot' => "string|max:191",
            'projectNameTrue' => "string|max:191",
            'projectNameAis' => "string|max:191",
            'projectNameFiberNet' => "string|max:191",
            'projectName3bb' => "string|max:191",
            'buildingSum' => "string|max:191",
            'buildingNumber' => "string|max:191",
            'buildingFloor' => "string|max:191",
            'unitFloor' => "string|max:191",
            'fmProgress' => "string|max:191",
            'teamserway' => "string|max:191",
            'surweyDate' => "date",
            'ifcccType' => "string|max:191",
            'ifcccStatus' => "string|max:191",
            'wallboxType' => "string|max:191",
            'wallboxStatus' => "string|max:191",
            'microductType' => "string|max:191",
            'microductStatus' => "string|max:191",

            'microductType1'  => "sometimes|required_if:microductType,FiberBlow|nullable|max:191",
            'microductType2' => "sometimes|required_if:microductType,FiberBlow|nullable|max:191",
            'microductSize' => "sometimes|required_if:microductType,FiberBlow|string|max:191",
            'microductFloor' => "sometimes|required_if:microductType,FiberBlow|string|max:191",
            'blowStatus' => "sometimes|required_if:microductType,FiberBlow|string|max:191",
            'blowCore' => "sometimes|required_if:microductType,FiberBlow|string|max:191",

            'convertionalType' => "sometimes|required_if:microductType,FiberConvertional|string|max:191",
            'convertionalFloor' => "sometimes|required_if:microductType,FiberConvertional|string|max:191",
            'vertically' => "sometimes|required_if:microductType,FiberConvertional|string|max:191",
            'verticallyType' => "sometimes|required_if:microductType,FiberConvertional|string|max:191",
            'buildingStatus' => "sometimes|required_if:microductType,FiberConvertional|string|max:191",
            'buildingDate' => "sometimes|required_if:microductType,FiberConvertional|nullable|date",

            'spliceStatus' => "string|max:191",
            'spliceCore' => "string|max:191",
            

            // 'desingBy_id' => "required|numeric",
            // 'surveyDesing_id' => "required|numeric",
            // 'ifcc_id' => "required|numeric",
            // 'wallBox_id' => "required|numeric",
            // 'microductD_id' => "sometimes|required_if:type,Microduct|nullable|numeric",
            // 'microductK_id' => "sometimes|required_if:type,Microduct|nullable|numeric",
            // 'fiberConvertion_id' => "sometimes|required_if:type,FiberConvertion|nullable|numeric",
            // 'projectNameTot' => "string|max:191",
            // 'projectNameTrue' => "string|max:191",
            // 'projectNameAis' => "string|max:191",
            // 'projectNameFiberNet' => "string|max:191",
            // 'projectName3bb' => "string|max:191",
            // 'surveyDesingDate' => "date",
            // 'ifccDate' => "date",
            // 'wallBoxDate' => "date",
            // 'type' => "string|max:191",
            // 'microductDateD' => "sometimes|required_if:type,Microduct|nullable|date",
            // 'microductDateK' => "sometimes|required_if:type,Microduct|nullable|date",
            // 'fiberConvertionDate' => "sometimes|required_if:type,FiberConvertion|nullable|date",
            // 'blow' => "string|max:191",
            // 'splice' => "string|max:191",
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
            'building_id' => "required|numeric",
            'desingBy_id' => "required|numeric",
            'surveyDesing_id' => "required|numeric",
            'ifcc_id' => "required|numeric",
            'wallBox_id' => "required|numeric",
            'microductD_id' => "sometimes|required_if:type,Microduct|nullable|numeric",
            'microductK_id' => "sometimes|required_if:type,Microduct|nullable|numeric",
            'fiberConvertion_id' => "sometimes|required_if:type,FiberConvertion|nullable|numeric",
            'projectNameTot' => "string|max:191",
            'projectNameTrue' => "string|max:191",
            'projectNameAis' => "string|max:191",
            'projectNameFiberNet' => "string|max:191",
            'projectName3bb' => "string|max:191",
            'surveyDesingDate' => "date",
            'ifccDate' => "date",
            'wallBoxDate' => "date",
            'type' => "string|max:191",
            'microductDateD' => "sometimes|required_if:type,Microduct|nullable|date",
            'microductDateK' => "sometimes|required_if:type,Microduct|nullable|date",
            'fiberConvertionDate' => "sometimes|required_if:type,FiberConvertion|nullable|date",
            'blow' => "string|max:191",
            'splice' => "string|max:191",
        ];
    }
}