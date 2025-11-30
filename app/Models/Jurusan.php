<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    //
    protected $guarded = ['id'];

    public function daftarCalonSiswa1()
    {
        return $this->hasMany(daftarCalonSiswa::class, 'jurusan_satu', 'kode_jurusan');
    }
    public function daftarCalonSiswa2()
    {
        return $this->hasMany(daftarCalonSiswa::class, 'jurusan_dua', 'kode_jurusan');
    }
}
