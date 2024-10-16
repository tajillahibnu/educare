<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassModel extends Model
{
    use HasFactory, SoftDeletes; // Gunakan trait SoftDeletes

    protected $fillable = [
        'name',
        'level',
        'program_studi',
        'is_active' // Tambahkan kolom ini untuk mass assignment
    ];


}
