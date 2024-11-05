<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentsRequest extends FormRequest
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
            'doctorid'=>'required|integer',
            'patientid'=>'required|integer',
            'departmentid'=>'required|integer',
            'date_of_appointment'=>'required|date',
            'status'=>'required|string',
            'name of doctor'=>'required|string',
            
        ];
    }
}
