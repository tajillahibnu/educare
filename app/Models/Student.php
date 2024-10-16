<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{

    use HasFactory, SoftDeletes; // Gunakan trait SoftDeletes

    protected $fillable = [
        'nis',
        'name',
        'date_of_birth',
        'gender',
        'address',
        'phone_number',
        'email',
        'photo',
        'is_active', // Tambahkan kolom ini untuk mass assignment
    ];

}
