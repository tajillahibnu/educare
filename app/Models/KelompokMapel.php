<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KelompokMapel extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['kurikulum_id', 'name', 'description'];

    public function curriculum()
    {
        return $this->belongsTo(Kurikulum::class);
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class, 'kurikulum_kelompok_mapels');
    }

}
