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
            'buildingId' => 'required|string|max:191',
            'fmCode' => 'string|max:191',
            'contactName' => 'string|max:191',
            'phone' => 'string|max:191',
            'email' => 'email',
            'area' => 'string|max:191',
            'floor' => 'numeric',
            'roomNumber' => 'numeric',
            'numberLayer' => 'numeric',
            'detailAdress' => 'string|max:1000',
            'province' => 'string|max:191',
            'city' => 'string|max:191',
            'postalCode' => 'string|max:191|regex:/\b\d{5}\b/',
            'latitude' => 'string|max:191',
            'longtude' => 'string|max:191',
            'priceSquare' => 'numeric',
            'workingTime' => 'date',
            'blance' => 'numeric',
            'developer' => 'string|max:191',
            'grade' => 'string|max:191',
            'note' => 'string|max:1000',
            // 'photo' => 'sometimes|files',
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
            'buildingId' => 'required|string|max:191',
            'fmCode' => 'string|max:191',
            'contactName' => 'string|max:191',
            'phone' => 'string|max:191',
            'email' => 'email',
            'area' => 'string|max:191',
            'floor' => 'numeric',
            'roomNumber' => 'numeric',
            'numberLayer' => 'numeric',
            'detailAdress' => 'string|max:1000',
            'province' => 'string|max:191',
            'city' => 'string|max:191',
            'postalCode' => 'string|max:191|regex:/\b\d{5}\b/',
            'latitude' => 'string|max:191',
            'longtude' => 'string|max:191',
            'priceSquare' => 'numeric',
            'workingTime' => 'date',
            'blance' => 'numeric',
            'developer' => 'string|max:191',
            'grade' => 'string|max:191',
            'note' => 'string|max:1000',
            // 'photo' => 'sometimes|files',
        ];
    }
}