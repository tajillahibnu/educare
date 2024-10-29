<?php

namespace Database\Seeders;

use App\Models\KelompokMapel;
use App\Models\Kurikulum;
use App\Models\Mapel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelompokMapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh data Kurikulum
        $curriculum = Kurikulum::first(); // Mengambil kurikulum pertama yang ada

        // Membuat data kelompok mapel
        $group1 = KelompokMapel::create([
            'kurikulum_id' => $curriculum->id,
            'name' => 'Kelompok A',
            'description' => 'Kelompok Mapel Utama'
        ]);

        $group2 = KelompokMapel::create([
            'kurikulum_id' => $curriculum->id,
            'name' => 'Kelompok B',
            'description' => 'Kelompok Mapel Pendukung'
        ]);

        // Menambahkan mapel ke kelompok mapel
        $subjects = Mapel::take(3)->get(); // Mengambil tiga mapel pertama untuk contoh

        foreach ($subjects as $subject) {
            $group1->mapel()->attach($subject->id);
        }
    }
}
