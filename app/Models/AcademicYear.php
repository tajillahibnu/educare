<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicYear extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['year', 'is_active'];

    public function semesters()
    {
        return $this->hasMany(Semester::class);
    }

    public function curriculums()
    {
        return $this->hasMany(Kurikulum::class);
    }

}
