<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\daftarCalonSiswa;
use App\Models\infroman;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SPMB extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('portal-pendaftran.index', [
            'jurusan' => Jurusan::all(),
            'informan' => infroman::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        // return $request;

        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'jenisKelamin' => 'required|string|in:L,P',
            'nisn' => 'required|max:10|unique:daftar_calon_siswas,nisn',
            'asalSekolah' => 'required|string|max:255',
            'wa' => 'required|string|max:15|unique:daftar_calon_siswas,nomor_telepon_aktif',
            'jurusan_satu' => 'required|exists:jurusans,kode_jurusan',
            'jurusan_dua' => 'required|exists:jurusans,kode_jurusan',
            'email' => 'required|email|unique:users,email',
            'infromen_id' => 'required_without:infromen_id_text|exists:infromen,id',
            'infromen_id_text' => 'required_without:infromen_id|max:255',
        ], [
            'Jurusan_satu.exists' => 'Pilihan Jurusan 1 tidak valid.',
            'jurusan_dua.exists' => 'Pilihan Jurusan 2 tidak valid.',
            'nama.required' => 'Nama lengkap wajib diisi.',
            'nisn.required' => 'NISN wajib diisi.',
            'nisn.max' => 'NISN maksimal 10 digit.',
            'nisn.unique' => 'NISN sudah terdaftar.',
            'asalSekolah.required' => 'Asal sekolah wajib diisi.',
            'wa.required' => 'Nomor WhatsApp wajib diisi.',
            'wa.unique' => 'Nomor WhatsApp sudah terdaftar.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'infromen_id.required_without' => 'Informan wajib diisi jika memilih guru.',
            'infromen_id.exists' => 'Informan tidak ditemukan.',
            'infromen_id_text.max' => 'Nama informan maksimal 255 karakter.',
        ]);

        // cek informan
        $informan = null;
        if ($request->status == "guru") {
            $informan = infroman::find($request->infromen_id);
        } else {
            // buat informan baru
            $informan = infroman::create([
                'nama_informan' => $request->infromen_id_text,
                'status' => $request->status,
            ]);
        }
        // dump($request->infromen_id);
        // dd($informan->id);

        // Simpan data pendaftaran ke database atau lakukan proses lainnya sesuai kebutuhan
        $daftarSiswa = daftarCalonSiswa::create([
            'nama' => $data['nama'],
            'jenis_kelamin' => $request->jenisKelamin,
            'nisn' => $data['nisn'],
            'asal_sekolah_smp_mts' => $data['asalSekolah'],
            'email_aktif' => $data['email'],
            'nomor_telepon_aktif' => $data['wa'],
            'jurusan_satu' => $data['jurusan_satu'],
            'jurusan_dua' => $data['jurusan_dua'],
            'infromen_id' => $informan->id,
        ]);

        $user = User::create([
            'name' => $data['nama'],
            'username' => $data['nisn'],
            'email' => $data['email'],
            'password' => $data['nisn'],
        ])->assignRole('calon-siswa');

        Mail::to($data['email'])->send(new SendEmail($daftarSiswa));

        return redirect()->route(route: 'spmb.index')->with('success', 'Pendaftaran berhasil. Silakan cek email atau WhatsApp Anda untuk mendapatkan username dan password.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
