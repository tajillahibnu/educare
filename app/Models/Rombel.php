<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rombel extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'code',
        'name',
        'tingkat',
        'romawi',
        'tipe',
        'kurikulum_id',
        'tingkat_id',
        'walikelas_id',
        'walikelas_name',
        'walikelas_nip',
        // 'kompt_id',
        // 'kompt_name',
    ];
}
