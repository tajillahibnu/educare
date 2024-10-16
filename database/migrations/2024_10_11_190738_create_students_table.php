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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nis')->unique(); // Nomor Induk Siswa
            $table->string('name'); // Nama siswa
            $table->date('date_of_birth'); // Tanggal lahir
            $table->string('gender'); // Jenis kelamin
            $table->string('address'); // Alamat
            $table->string('phone_number')->nullable(); // Nomor telepon
            $table->string('email')->unique()->nullable(); // Email, opsional
            $table->string('photo')->nullable(); // Foto siswa, opsional
            $table->boolean('is_active')->default(true); // Status aktif/tidak aktif
            $table->timestamps();
            $table->softDeletes(); // Soft delete untuk menghapus data tanpa menghilangkan catatan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
