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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('employee_type'); // 'guru' or 'karyawan'
            $table->string('nik')->unique();
            $table->string('nip')->nullable(); // Optional field
            $table->string('photo')->nullable();
            $table->date('start_date'); // Tanggal mulai jabatan
            $table->date('birth_date'); // Biodata umum
            $table->string('gender', 10);
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique()->nullable();
            $table->boolean('is_active')->default(true); // Opsi aktif/tidak aktif
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
