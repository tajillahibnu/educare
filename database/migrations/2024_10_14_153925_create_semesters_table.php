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
            $table->integer('code')->nullable(); // Nama Semester, misalnya "Ganjil" atau "Genap"
            $table->string('name'); // Nama Semester, misalnya "Ganjil" atau "Genap"
            $table->foreignId('academic_year_id')->nullable()->constrained()->onDelete('cascade'); // Relasi ke Tahun Akademik
            // $table->foreignId('kurikulums_id')->constrained()->onDelete('cascade'); // Relasi ke Tahun Akademik
            $table->boolean('is_active')->default(false); // Status aktif atau tidak
            $table->dateTime('semester_mulai')->nullable();
            $table->dateTime('semester_akhir')->nullable();
            $table->dateTime('tanggal_uas')->nullable();
            $table->dateTime('tanggal_mulai_uas')->nullable();
            $table->dateTime('tanggal_akhir_uas')->nullable();
            $table->dateTime('tanggal_uts')->nullable();
            $table->dateTime('tanggal_mulai_uts')->nullable();
            $table->dateTime('tanggal_akhir_uts')->nullable();
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
