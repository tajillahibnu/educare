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
        Schema::create('rombels', function (Blueprint $table) {
            $table->id();
            $table->string('code', 32)->nullable();
            $table->string('name', 150);
            $table->string('tingkat', 150)->nullable();
            $table->string('romawi', 8)->nullable();
            $table->enum('tipe', ['KBM', 'EKTRAKURIKULER', 'KBM_KELOMPOK', 'GABUNGAN'])->default('KBM');
            // $table->string('tahun_pelajaran', 9)->nullable();
            $table->foreignId('tingkat_id')->constrained()->onDelete('cascade'); // Relasi ke Kurikulum
            $table->foreignId('kurikulum_id')->constrained()->onDelete('cascade'); // Relasi ke Kurikulum


            $table->unsignedBigInteger('walikelas_id')->nullable();
            $table->foreign('walikelas_id')->references('id')->on('employees')->onUpdate('cascade');
            $table->string('walikelas_nip', 32)->nullable();
            $table->string('walikelas_name', 150)->nullable();
            
            $table->integer('kuota_min_siswa')->nullable();
            $table->integer('kuota_max_siswa')->nullable();
            $table->boolean('is_active')->default(false); // Status aktif atau tidak
            

            // $table->string('spek_name', 150)->nullable();
            // $table->unsignedBigInteger('spek_id')->nullable();
            // $table->foreign('spek_id')->references('id')->on('spektrums')->onUpdate('cascade');
            // $table->string('kompt_name', 150)->nullable();
            // $table->unsignedBigInteger('kompt_id')->nullable();
            // $table->foreign('kompt_id')->references('id')->on('kompt_keahlians')->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade');
            $table->unsignedBigInteger('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade');
            $table->unsignedBigInteger('deleted_by')->unsigned()->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rombels');
    }
};
