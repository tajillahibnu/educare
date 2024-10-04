<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'type', 'url', 'parent_id', 'level', 'menu_order','view_path','view_file'];
    protected $casts = [
        'middlewares' => 'array',
    ];

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }
    
    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'menu_role_permission')
                    ->withPivot('permission_id')
                    ->withTimestamps();
    }
}
