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
            'first_name' => [
            'bail',
            'required',
            'string',
            'min:2',
            'max:255',
        ],
             'last_name' => [
                'bail',
                'required',
                'string',
                'min:2',
                'max:255',
            ],
            'gender' => [
                'bail',
                'required',
                'in:0,1',
            ],
            'date_of_birth' => [
                'bail',
                'required',
                'date',
                'before_or_equal:today',
            ],
            'status' => [
                'bail',
                'required',
                'in:0,1,2',
            ],
            'course_id' => [
                'bail',
                'required',
                'exists:courses,id',
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'first_name.required' => 'Bắt buộc nhập tên',
            'last_name.required' => 'Bắt buộc nhập họ',
        ];
    }
}
