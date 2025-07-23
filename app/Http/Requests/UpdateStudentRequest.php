<?php

namespace App\Http\Requests;

use App\Models\Student;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'first_name' => [
            'bail',
            'required',
            'string',
            'max:255',
            Rule::unique(Student::class)->ignore($this->route('student')),
        ],
             'last_name' => [
                'bail',
                'required',
                'string',
                'max:255',
            ],
            'gender' => [
                'bail',
                'required',
                Rule::in([0, 1]),
            ],
            'date_of_birth' => [
                'bail',
                'required',
                'date',
                'before_or_equal:today',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'The first name is required.',
            'last_name.required' => 'The last name is required.',
        ];
    }
}
