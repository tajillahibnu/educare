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
        Schema::create('bahasa', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID sebagai primary key
            $table->string('kode', 5)->unique(); // Kode bahasa seperti 'id', 'en', 'fr'
            $table->string('nama'); // Nama bahasa seperti 'Bahasa Indonesia', 'English'
            $table->json('translations')->nullable(); // JSON untuk mendukung data i18n
            $table->text('deskripsi')->nullable(); // Deskripsi bahasa
            $table->boolean('aktif')->default(true); // Status bahasa aktif/tidak
            $table->timestamps(); // Timestamps created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bahasa');
    }
};
