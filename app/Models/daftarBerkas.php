<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class daftarBerkas extends Model
{
    //
    protected $guarded = ['id'];

    public function calonSiswa()
    {
        return $this->belongsTo(daftarCalonSiswa::class, 'daftar_calon_siswa_id', 'id');
    }
}
