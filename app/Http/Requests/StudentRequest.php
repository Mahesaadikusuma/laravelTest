<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:20',
            'gender' => 'required',
            'nis' => 'required|unique:students,id|max:5',
            'class_id' => 'required|exists:class,id',
        ];
    }


    public function attributes(): array
    {
        return [
            'class_id' => 'class',
            'gender' => 'Gender',
        ];
    }

    public function messages(): array
    {
        return [
            'nis.required' => 'Nomor Induk Siswa Wajib Diisi',
            'nis.max' => 'NIS Maksimal :max karakter',
            'name.required' => 'Name Wajib Diisi', 
        ];
    }
}
