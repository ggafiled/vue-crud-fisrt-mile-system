<?php

namespace App\Http\Requests\Progress;

use Illuminate\Foundation\Http\FormRequest;

class ProgressRequest extends FormRequest
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
            'fmProgress_id' => "sometimes|required|numeric",
            'aisProgress_id' => "sometimes|required|numeric",
            'totProgress_id' => "sometimes|required|numeric",
            'progress3bb_id' => "sometimes|required|numeric",
            'sinetProgress_id' => "sometimes|required|numeric",
            'fnProgress_id' => "sometimes|required|numeric",
            'trueProgress_id' => "sometimes|required|numeric",
            'dateFm' => "sometimes|required_if:fmProgress_id,numeric|nullable|date",
            'dateTot' => "sometimes|required_if:totProgress_id,numeric|nullable|date",
            'dateAis' => "sometimes|required_if:aisProgress_id,numeric|nullable|date",
            'date3BB' => "sometimes|required_if:progress3bb_id,numeric|nullable|date",
            'dateSinet' => "sometimes|required_if:sinetProgress_id,numeric|nullable|date",
            'dateFn' => "sometimes|required_if:fnProgress_id,numeric|nullable|date",
            'dateTrue' => "sometimes|required_if:trueProgress_id,numeric|nullable|date",
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
            'fmProgress_id' => "sometimes|required|numeric",
            'aisProgress_id' => "sometimes|required|numeric",
            'totProgress_id' => "sometimes|required|numeric",
            'progress3bb_id' => "sometimes|required|numeric",
            'sinetProgress_id' => "sometimes|required|numeric",
            'fnProgress_id' => "sometimes|required|numeric",
            'trueProgress_id' => "sometimes|required|numeric",
            'dateFm' => "sometimes|required_if:fmProgress_id,numeric|nullable|date",
            'dateTot' => "sometimes|required_if:totProgress_id,numeric|nullable|date",
            'dateAis' => "sometimes|required_if:aisProgress_id,numeric|nullable|date",
            'date3BB' => "sometimes|required_if:progress3bb_id,numeric|nullable|date",
            'dateSinet' => "sometimes|required_if:sinetProgress_id,numeric|nullable|date",
            'dateFn' => "sometimes|required_if:fnProgress_id,numeric|nullable|date",
            'dateTrue' => "sometimes|required_if:trueProgress_id,numeric|nullable|date",
        ];
    }
}