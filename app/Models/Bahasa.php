<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahasa extends Model
{
    use HasFactory;

    protected $table = 'bahasa';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = ['id', 'kode', 'nama', 'translations', 'deskripsi', 'aktif'];

    // Menentukan tipe data JSON untuk kolom translations
    protected $casts = [
        'id' => 'string',
        'translations' => 'array',
    ];

}
