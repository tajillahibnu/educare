<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mapel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'color',
        'is_active',
        'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo(Mapel::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Mapel::class, 'parent_id');
    }

}
