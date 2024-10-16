<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use App\Models\Kurikulum;
use App\Models\Semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambah data Tahun Akademik
        $academicYear = AcademicYear::create([
            'year' => '2023/2024',
            'is_active' => true
        ]);

        // Menambah data Semester untuk Tahun Akademik tersebut
        $semester1 = Semester::create([
            'name' => 'Ganjil',
            'is_active' => true,
            'academic_year_id' => $academicYear->id
        ]);

        $semester2 = Semester::create([
            'name' => 'Genap',
            'is_active' => false,
            'academic_year_id' => $academicYear->id
        ]);

        // Menambah data Kurikulum
        Kurikulum::create([
            'name' => 'Kurikulum 2013',
            'academic_year_id' => $academicYear->id,
            'semester_id' => $semester1->id,
            'is_active' => true
        ]);
    }
}
