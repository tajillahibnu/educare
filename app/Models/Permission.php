<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'menu_role_permission')
                    ->withPivot('menu_id')
                    ->withTimestamps();
    }
}
