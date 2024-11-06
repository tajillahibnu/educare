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
        Schema::create('kelompok_mapels', function (Blueprint $table) {
            $table->id();
            $table->string('kelompok_mapel_code',10)->nullable(); // Nama kelompok mapel
            $table->foreignId('kurikulum_id')->constrained()->onDelete('cascade'); // Relasi ke Kurikulum
            $table->unsignedBigInteger('parent_id')->unsigned()->nullable();
            $table->foreign('parent_id')->references('id')->on('kelompok_mapels')->onUpdate('cascade');
            $table->string('name'); // Nama kelompok mapel
            $table->string('description')->nullable(); // Deskripsi
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('kurikulum_kelompok_mapels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelompok_mapel_id')->constrained()->onDelete('cascade'); // Relasi ke SubjectGroup
            $table->foreignId('mapel_id')->constrained()->onDelete('cascade'); // Relasi ke Mapel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelompok_mapels');
        Schema::dropIfExists('kurikulum_kelompok_mapels');

    }
};
