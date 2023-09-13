<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileStudentRequest extends FormRequest
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
        'nik' => 'required|integer|digits:5',
        'name' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|in:LAKI-LAKI,PEREMPUAN',
        'alamat' => 'required',
        'rt_rw' => 'required',
        'kelurahan' => 'required',
        'kecamatan' => 'required',
        'agama' => 'required',
        'status_perkawinan' => 'required',
        'pekerjaan' => 'required',
        'kewarganegaraan' => 'required|in:WNI,WNA',
        ];
    }
}
