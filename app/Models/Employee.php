<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'employee_type',
        'NIK',
        'NIP',
        'photo',
        'start_date',
        'birth_date',
        'gender',
        'address',
        'phone',
        'email',
        'is_active' // Tambahkan kolom ini untuk mass assignment
    ];

}
