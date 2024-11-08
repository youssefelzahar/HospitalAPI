<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTreatmentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "prescribed_treatment"=>"required",
            "dosage"=>"required",
            "treatments_description"=>"required",
            "patient_id"=>"required",
            "doctor_id"=>"required",
            "medication_id"=>"required",

        ];
    }
}
