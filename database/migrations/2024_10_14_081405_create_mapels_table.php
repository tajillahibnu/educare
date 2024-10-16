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
        Schema::create('mapels', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Kode Mapel unik
            $table->string('name'); // Nama Mapel
            $table->string('color')->nullable(); // Warna untuk Mapel
            $table->boolean('is_active')->default(true); // Status aktif/tidak aktif
            $table->foreignId('parent_id')->nullable()->constrained('mapels')->onDelete('cascade'); // ID parent untuk Mapel turunan
            $table->timestamps();
            $table->softDeletes(); // Soft delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapels');
    }
};
