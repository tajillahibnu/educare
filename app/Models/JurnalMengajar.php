<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalMengajar extends Model
{
    use HasFactory;

    // protected $table = 'jurnal_mengajar';

    protected $fillable = [
        'guru_id',
        'kelas_id',
        'mapel_id',
        'jam_masuk',
        'jam_berakhir',
        'jam_masuk_real',
        'jam_berakhir_real',
        'jumlah_siswa_hadir',
        'jumlah_alpha',
        'jumlah_izin',
        'jumlah_sakit',
        'sks',
        'durasi_mengajar',
        'tipe_pertemuan',
        'materi',
        'catatan',
        'status_approval_waka',
        'status_approval_walikelas',
        'tanggal_approval_waka',
        'tanggal_approval_walikelas',
    ];

    protected $dates = ['jam_masuk', 'jam_berakhir', 'jam_masuk_real', 'jam_berakhir_real', 'tanggal_approval_waka', 'tanggal_approval_walikelas'];


    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function guru()
    {
        return $this->belongsTo(Employee::class);
    }

    // public function kelas()
    // {
    //     return $this->belongsTo(Kelas::class);
    // }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    // Calculate duration of teaching in minutes
    public function calculateDuration()
    {
        if ($this->jam_masuk_real && $this->jam_berakhir_real) {
            return $this->jam_berakhir_real->diffInMinutes($this->jam_masuk_real);
        }
        return null;
    }
}
