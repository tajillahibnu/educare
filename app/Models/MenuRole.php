<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuRole extends Model
{
    use HasFactory;

    protected $fillable = ['role_id', 'menu_id'];

    protected $hidden = ['created_at', 'updated_at'];

    // Relasi ke model Menu
    // public function menu()
    // {
    //     return $this->belongsToMany(Menu::class, 'menu_roles', 'role_id', 'menu_id');
    // }
}
