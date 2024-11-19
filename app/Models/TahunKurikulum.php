<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunKurikulum extends Model
{
    use HasFactory;

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'tingkat_id',
        'kurikulum_id',
        'tahun',
    ];

    // Jika Anda ingin mendefinisikan relasi, Anda bisa menambahkannya di sini
    public function tingkat()
    {
        return $this->belongsTo(Tingkat::class);
    }

    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class);
    }

    // Relasi dengan model Tahun menggunakan field 'year'
    // public function tahun()
    // {
    //     return $this->belongsTo(AcademicYear::class, 'tahun_id', 'year');
    // }
}
