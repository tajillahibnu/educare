<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kurikulum extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name', 'is_active'];
    // protected $fillable = ['name', 'academic_year_id', 'is_active'];

    // public function academicYear()
    // {
    //     return $this->belongsTo(AcademicYear::class);
    // }

    // public function semester()
    // {
    //     return $this->belongsTo(Semester::class);
    // }

}
