<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunRombel extends Model
{
    use HasFactory;
    protected $fillable = [
        'rombel_id',
        'tingkat_id',
        'walikelas_id',
        'kurikulum_id',
        'tahun_kurikulum_id',
        'tahun',
    ];

}
