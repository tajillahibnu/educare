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
        Schema::create('class_models', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Nama kelas, misalnya "X RPL 1", "XI PPLG 2"
            $table->string('level')->default('SMK'); // Tingkatan, default "SMK"
            $table->string('program_studi')->nullable(); // Program studi, misalnya "Rekayasa Perangkat Lunak", "Teknik Jaringan"
            $table->boolean('is_active')->default(true); // Opsi aktif/tidak aktif
            $table->timestamps();
            $table->softDeletes(); // Soft delete untuk menghapus data tanpa menghilangkan catatan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_models');
    }
};
