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
        Schema::create('jurnal_mengajars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('guru_id')->constrained('employees')->onDelete('cascade');
            // $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            $table->foreignId('mapel_id')->constrained('mapels')->onDelete('cascade');
            $table->dateTime('jam_masuk')->nullable();
            $table->dateTime('jam_berakhir')->nullable();
            $table->timestamp('jam_masuk_real')->useCurrent();
            $table->timestamp('jam_berakhir_real')->nullable();

            // Informasi kehadiran siswa
            $table->integer('jumlah_siswa_hadir')->default(0);
            $table->integer('jumlah_alpha')->default(0);
            $table->integer('jumlah_izin')->default(0);
            $table->integer('jumlah_sakit')->default(0);

            // Informasi tambahan untuk laporan
            $table->integer('sks')->default(0);
            $table->integer('durasi_mengajar')->nullable();
            $table->string('tipe_pertemuan')->nullable();
            $table->text('materi')->nullable();
            $table->text('catatan')->nullable();

            // Kolom approval
            $table->enum('status_approval_waka', ['pending', 'approved', 'rejected'])->default('pending');
            $table->enum('status_approval_walikelas', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamp('tanggal_approval_waka')->nullable();
            $table->timestamp('tanggal_approval_walikelas')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnal_mengajars');
    }
};
