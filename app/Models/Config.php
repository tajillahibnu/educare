<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;
    protected $fillable = [
        'config_kode',
        'config_name',
        'config_title',
        'config_info',
        'config_tipe',
        'config_value',
        'config_input',
        'config_description',
    ];
}
