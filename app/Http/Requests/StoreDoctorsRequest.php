<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorsRequest extends FormRequest
{
/*************  ✨ Codeium Command 🌟  *************/
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // By default, we allow any authenticated user to create a new doctor.
        // If you want to restrict this to only certain users, you can modify this method accordingly.
        return true;
    }

/******  c4707e7e-d724-4ae4-a686-5d30ff5fca29  *******/

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //

            'name' => 'required|string',
            'gender'=>'required|string',
            'phone'=>'required|string',
            'department'=>'required|string',
            'work_hours'=>'required|date',

        ];
    }
}
