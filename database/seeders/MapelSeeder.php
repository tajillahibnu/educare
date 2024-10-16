<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Parent Subjects
        $parentSubjects = [
            ['code' => 'MATH', 'name' => 'Matematika', 'color' => '#FF5733'],
            ['code' => 'SCI', 'name' => 'IPA', 'color' => '#33FF57'],
        ];

        foreach ($parentSubjects as $subject) {
            Mapel::create($subject);
        }

        // Child Subjects
        $childSubjects = [
            ['code' => 'PHY', 'name' => 'Fisika', 'color' => '#3385FF', 'parent_id' => 2],
            ['code' => 'CHE', 'name' => 'Kimia', 'color' => '#FF33A8', 'parent_id' => 2],
        ];

        foreach ($childSubjects as $subject) {
            Mapel::create($subject);
        }
    }
}
