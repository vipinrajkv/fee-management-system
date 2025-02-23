<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'student_name' => 'required',
            'student_email' => 'required|email|unique:students,student_email',
            'student_phone' => 'required',
            'student_dob' => 'required',
            'student_address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'student_email.unique' => 'This email is already taken.',
        ];
    }
}
