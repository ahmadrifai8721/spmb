<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class daftarCalonSiswa extends Model
{
    //
    protected $guarded = ['id'];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'status' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nisn', 'username');
    }
    public function berkas()
    {
        return $this->hasOne(daftarBerkas::class, 'daftar_calon_siswa_id', 'id');
    }

    public function jurusan1()
    {
        return $this->hasOne(Jurusan::class, 'kode_jurusan', 'jurusan_satu');
    }
    public function jurusan2()
    {
        return $this->hasOne(Jurusan::class, 'kode_jurusan', 'jurusan_dua');
    }
    public function infromen()
    {
        return $this->hasOne(infroman::class, 'id', 'infromen_id');
    }
}
