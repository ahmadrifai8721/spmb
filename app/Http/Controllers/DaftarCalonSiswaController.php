<?php

namespace App\Http\Controllers;

use App\Models\daftarBerkas;
use App\Models\daftarCalonSiswa;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class DaftarCalonSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $getDataSiswa = auth()->user()->daftarCalonSiswa;

        if ($getDataSiswa->status && ($getDataSiswa->berkas ?? false) && $getDataSiswa->berkas->status) {
            return redirect()->route('finis')->with('info', 'Data Sudah Lengkap Silahkan Mengugu validasi data.');
        }

        // dd($getDataSiswa);
        return view('portal-pendaftran.daftar-ulang', [
            'bio' => $getDataSiswa->status,
            'berkas' => $getDataSiswa->berkas->status ?? false,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('portal-pendaftran.biodata', [
            'data' => auth()->user()->daftarCalonSiswa,
            'jurusan' => Jurusan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(daftarCalonSiswa $daftar_ulang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(daftarCalonSiswa $daftar_ulang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, daftarCalonSiswa $daftar_ulang)
    {
        //
        // dd($request->all());
        // dd($daftar_ulang);
        $data = $request->validate([
            'nama'                              => 'required|string|max:255',
            'jenisKelamin'                      => 'required|string|in:L,P',
            'asal_sekolah'                      => 'required|string|max:255',
            'jurusan_satu'                      => 'required|exists:jurusans,kode_jurusan',
            'jurusan_dua'                       => 'required|exists:jurusans,kode_jurusan',
            'tempat_lahir'                      => 'required|string|max:255',
            'tanggal_lahir'                     => 'required|date',
            'agama'                             => 'required|string|in:Islam,Kristen,Hindu,Buddha,Katolik,Konghucu',
            'alamat_calon_peserta_didik'        => 'required|string|max:500',
            'nama_ayah'                         => 'required|string|max:255',
            'pekerjaan_ayah'                    => 'required|string|max:255',
            'nama_ibu'                          => 'required|string|max:255',
            'pekerjaan_ibu'                     => 'required|string|max:255',
            'nama_wali'                         => 'nullable|string|max:255',
            'alamat_wali_calon_peserta_didik'   => 'required|string|max:500',
            'status_dalam_keluarga'              => 'required|string|in:Anak Kandung,Anak Tiri,Anak Angkat',
        ], [
            'nama.required'                        => 'Nama lengkap wajib diisi.',
            'nama.max'                             => 'Nama maksimal 255 karakter.',
            'jenisKelamin.required'                => 'Jenis kelamin wajib dipilih.',
            'jenisKelamin.in'                      => 'Jenis kelamin harus L atau P.',
            'asal_sekolah.required'                => 'Asal sekolah wajib diisi.',
            'asal_sekolah.max'                     => 'Asal sekolah maksimal 255 karakter.',
            'jurusan_satu.required'                => 'Pilihan jurusan 1 wajib dipilih.',
            'jurusan_satu.exists'                  => 'Pilihan jurusan 1 tidak valid.',
            'jurusan_dua.required'                 => 'Pilihan jurusan 2 wajib dipilih.',
            'jurusan_dua.exists'                   => 'Pilihan jurusan 2 tidak valid.',
            'tempat_lahir.required'                => 'Tempat lahir wajib diisi.',
            'tanggal_lahir.required'               => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date'                   => 'Tanggal lahir harus berupa tanggal yang valid.',
            'agama.required'                       => 'Agama wajib dipilih.',
            'agama.in'                             => 'Agama yang dipilih tidak valid.',
            'alamat_calon_peserta_didik.required'  => 'Alamat wajib diisi.',
            'alamat_calon_peserta_didik.max'       => 'Alamat maksimal 500 karakter.',
            'nama_ayah.required'                   => 'Nama ayah wajib diisi.',
            'pekerjaan_ayah.required'              => 'Pekerjaan ayah wajib diisi.',
            'nama_ibu.required'                    => 'Nama ibu wajib diisi.',
            'pekerjaan_ibu.required'               => 'Pekerjaan ibu wajib diisi.',
            'nama_wali.max'                        => 'Nama wali maksimal 255 karakter.',
            'alamat_wali_calon_peserta_didik.required' => 'Alamat wali calon peserta didik wajib diisi.',
            'alamat_wali_calon_peserta_didik.max'  => 'Alamat wali calon peserta didik maksimal 500 karakter.',
            'status_dalam_keluarga.required'       => 'Status dalam keluarga wajib dipilih.',
            'status_dalam_keluarga.in'             => 'Status dalam keluarga tidak valid.',
        ]);

        // dd($data);
        $daftar_ulang->update([
            'nama'                              => $data['nama'],
            'jenis_elamin'                      => $data['jenisKelamin'],
            'asal_sekolah'                      => $data['asal_sekolah'],
            'jurusan_satu'                      => $data['jurusan_satu'],
            'jurusan_dua'                       => $data['jurusan_dua'],
            'tempat_lahir'                      => $data['tempat_lahir'],
            'tanggal_lahir'                     => $data['tanggal_lahir'],
            'agama'                             => $data['agama'],
            'alamat_calon_peserta_didik'        => $data['alamat_calon_peserta_didik'],
            'nama_ayah'                         => $data['nama_ayah'],
            'pekerjaan_ayah'                    => $data['pekerjaan_ayah'],
            'nama_ibu'                          => $data['nama_ibu'],
            'pekerjaan_ibu'                     => $data['pekerjaan_ibu'],
            'nama_wali'                         => $data['nama_wali'],
            'alamat_wali_calon_peserta_didik'   => $data['alamat_wali_calon_peserta_didik'],
            'status_dalam_keluarga'             => $data['status_dalam_keluarga'],
            'status'                            => true,
        ]);
        return redirect()->route('du.create')->with('success', 'Biodata berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(daftarCalonSiswa $daftar_ulang)
    {
        //
    }
}
