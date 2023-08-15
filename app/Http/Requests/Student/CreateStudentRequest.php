<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'code' => 'required|unique:students',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|unique:students',
            'level_id' => 'required|exists:levels,id',
        ];
    }
}
