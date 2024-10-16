<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('semesters', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama Semester, misalnya "Ganjil" atau "Genap"
            $table->boolean('is_active')->default(false); // Status aktif atau tidak
            $table->foreignId('academic_year_id')->constrained()->onDelete('cascade'); // Relasi ke Tahun Akademik
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semesters');
    }
};
