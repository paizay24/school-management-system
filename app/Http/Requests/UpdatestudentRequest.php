<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatestudentRequest extends FormRequest
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
           'name' => 'required|min:5',
            'email' => 'required',
            'phone' => 'required|min:6',
            'address' => 'required|min:3',
            'student_img' => 'required|mimes:png,jpg,jpeg|file|max:2048',
            'roll_no' => 'required|numeric',
            'gender' => 'required',
            'classroom_id' => 'required|exists:classrooms,id'
        ];
    }
}
