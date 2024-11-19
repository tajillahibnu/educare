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
        Schema::create('tahun_kurikulums', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis
            $table->unsignedBigInteger('tingkat_id'); // Kolom tingkat_id
            $table->unsignedBigInteger('kurikulum_id'); // Kolom kurikulum_id
            $table->string('tahun',9); // Kolom 
            $table->timestamps(); // Kolom created_at dan updated_at

            // Menambahkan foreign key jika diperlukan
            $table->foreign('tingkat_id')->references('id')->on('tingkats')->onDelete('cascade');
            $table->foreign('kurikulum_id')->references('id')->on('kurikulums')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tahun_kurikulums');
    }
};
