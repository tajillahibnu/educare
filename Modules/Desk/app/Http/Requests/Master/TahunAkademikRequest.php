<?php

namespace Modules\Desk\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TahunAkademikRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        // Ambil id dari route jika ada
        $id = $this->route('id'); // Misalnya route adalah /tahun-akademik/{id}

        // Tentukan apakah kita sedang melakukan update
        $isUpdate = !is_null($id);
        return [
            'year' => [
                'required', // Field name harus ada
                'max:20',
                // Tambahkan aturan unik berdasarkan apakah ini adalah update
                $isUpdate
                    ? Rule::unique('academic_years')->ignore($id) // Untuk update, abaikan ID yang ada
                    : 'unique:academic_years' // Untuk store, harus unik
            ],
        ];

        // return [
        //     'name' => [
        //         'max:20',
        //         // Menambahkan pengecualian unique untuk kasus update
        //         Rule::unique('academic_years', 'year')->ignore($id),
        //     ],
        // ];
    }

    public function messages()
    {
        return [
            'year.unique' => 'Tahun sudah digunakan.',
            'year.required' => 'Tahun harus di isi.',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
