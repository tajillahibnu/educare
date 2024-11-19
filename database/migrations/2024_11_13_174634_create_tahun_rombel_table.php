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
        Schema::create('tahun_rombels', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis
            $table->unsignedBigInteger('rombel_id'); // Kolom rombel_id
            $table->unsignedBigInteger('tingkat_id'); // Kolom rombel_id
            $table->unsignedBigInteger('walikelas_id')->nullable(); // Kolom walikelas_id
            $table->unsignedBigInteger('kurikulum_id'); // Kolom walikelas_id
            $table->unsignedBigInteger('tahun_kurikulum_id'); // Kolom walikelas_id
            $table->string('tahun'); // Kolom tahun
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tahun_rombel');
    }
};
