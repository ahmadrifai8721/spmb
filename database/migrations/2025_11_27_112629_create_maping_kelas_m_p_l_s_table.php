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
        Schema::create('maping_kelas_m_p_l_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_m_p_l_id')->constrained('kelas_m_p_l_s')->onDelete('cascade');
            $table->foreignId('daftar_calon_siswa_id')->constrained('daftar_calon_siswas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maping_kelas_m_p_l_s');
    }
};
