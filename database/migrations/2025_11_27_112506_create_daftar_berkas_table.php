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
        Schema::create('daftar_berkas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('daftar_calon_siswa_id')->constrained('daftar_calon_siswas')->onDelete('cascade');
            $table->string('kk');
            $table->string('ijazah');
            $table->string('akte');
            $table->string('KIP')->nullable();
            $table->string('PKH')->nullable();
            $table->string('SKTM')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_berkas');
    }
};
