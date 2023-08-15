<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'email' => [
                'required',
                'email',
                Rule::unique('students')->ignore($this->student)
            ],
            'level_id' => 'required|exists:levels,id',
        ];
    }
}
