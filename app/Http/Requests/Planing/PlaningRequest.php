<?php

namespace App\Http\Requests\Planing;

use Illuminate\Foundation\Http\FormRequest;

class PlaningRequest extends FormRequest
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
            'isp_id' => "required|numeric",
            'agentDetail_id' => "required|numeric",
            'jobtype_id' => "required|numeric",
            'technician_id' => "required|numeric",
            'callver_id' => "required|numeric",
            'callverStatus_id' => "required|numeric",
            'ispId_id' => "required|numeric",
            'problemsolution_id' => "required|numeric",
            'name' => "string|max:191",
            'surname' => "string|max:191",
            'tel' => "string|max:191",
            'tel2' => "string|max:191",
            'theBuilding' => "string|max:191",
            'floor' => "string|max:191",
            'room' => "string|max:191",
            'circuit' => "string|max:191",
            'entranceFee' => "string|max:191",
            'appointmentDate' => "date",
            // 'appointmentTime' => "time",
            'status' => "string|max:191",
            'subStatus' => "string|max:191",
            'reMark' => "string|max:191",
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
            'isp_id' => "required|numeric",
            'agentDetail_id' => "required|numeric",
            'jobtype_id' => "required|numeric",
            'technician_id' => "required|numeric",
            'callver_id' => "required|numeric",
            'callverStatus_id' => "required|numeric",
            'ispId_id' => "required|numeric",
            'problemsolution_id' => "required|numeric",
            'name' => "string|max:191",
            'surname' => "string|max:191",
            'tel' => "string|max:191",
            'tel2' => "string|max:191",
            'theBuilding' => "string|max:191",
            'floor' => "string|max:191",
            'room' => "string|max:191",
            'circuit' => "string|max:191",
            'entranceFee' => "string|max:191",
            'appointmentDate' => "date",
            // 'appointmentTime' => "time",
            'status' => "string|max:191",
            'subStatus' => "string|max:191",
            'reMark' => "string|max:191",
        ];
    }
}