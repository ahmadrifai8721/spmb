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
        Schema::create('infromen', function (Blueprint $table) {
            $table->id();
            $table->string('nama_informan');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('daftar_calon_siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nisn')->unique();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('agama')->nullable();
            $table->string('asal_sekolah_smp_mts')->nullable();
            $table->text('alamat_calon_peserta_didik')->nullable();
            $table->string('status_dalam_keluarga')->nullable();
            $table->string('nomor_telepon_aktif')->unique()->nullable();
            $table->string('email_aktif')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('nama_wali')->nullable();
            $table->text('alamat_wali_calon_peserta_didik')->nullable();
            $table->string('jurusan_satu');
            $table->string('jurusan_dua');
            $table->foreignId('infromen_id')->nullable()->constrained('infromen')->onDelete('set null');
            $table->boolean('editJurusan')->default(false);
            $table->boolean('status')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_calon_siswas');
        Schema::dropIfExists('infromen');
    }
};
