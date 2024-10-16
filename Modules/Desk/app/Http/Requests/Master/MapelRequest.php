<?php

namespace Modules\Desk\app\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class MapelRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return
            [
                'mapel_kode' => ['max:20', 'unique:mapels'],
                // 'mapel_raport' => ['required', 'string'],
                // 'mapel_rombel' => ['required', 'string'],
            ];
    }

    public function messages()
    {
        return [
            'mapel_kode.unique' => 'Kode sudah digunakan.',
            'mapel_raport.required' => 'Nama matapelajaran raport harus diisi.',
            // 'mapel_raport.string' => 'Nama matapelajaran raport harus berupa teks.',
            // 'mapel_rombel.required' => 'Icon role harus diisi.',
            // 'mapel_rombel.string' => 'Icon harus berupa teks.',
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
