<?php

namespace App\Http\Controllers;

use App\Models\daftarBerkas;
use Illuminate\Http\Request;

class DaftarBerkasController extends Controller
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

        return view('portal-pendaftran.upload-berkas', [
            "dokumen" => daftarBerkas::where('daftar_calon_siswa_id', auth()->user()->daftarCalonSiswa->id)->first()
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
        // dd(
        //     auth()->user()->daftarCalonSiswa->berkas()->exists()
        // );
        if (auth()->user()->daftarCalonSiswa->berkas()->exists()) {
            $validated = $request->validate([
                // Dokumen wajib
                'kk'     => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
                'ijazah' => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
                'akta'   => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',

                // Dokumen opsional
                'kip'    => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
                'pkh'    => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
                'sktm'   => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
            ], [
                // Pesan error custom

                'kk.mimes'        => 'Format KK harus PDF atau JPG.',
                'kk.max'          => 'Ukuran file KK maksimal 2MB.',


                'ijazah.mimes'    => 'Format Ijazah harus PDF atau JPG.',
                'ijazah.max'      => 'Ukuran file Ijazah maksimal 2MB.',


                'akta.mimes'      => 'Format Akta harus PDF atau JPG.',
                'akta.max'        => 'Ukuran file Akta maksimal 2MB.',

                'kip.mimes'       => 'Format KIP harus PDF atau JPG.',
                'kip.max'         => 'Ukuran file KIP maksimal 2MB.',

                'pkh.mimes'       => 'Format PKH harus PDF atau JPG.',
                'pkh.max'         => 'Ukuran file PKH maksimal 2MB.',

                'sktm.mimes'      => 'Format SKTM harus PDF atau JPG.',
                'sktm.max'        => 'Ukuran file SKTM maksimal 2MB.',
            ]);
        } else {
            $validated = $request->validate([
                // Dokumen wajib
                'kk'     => 'required|file|mimes:pdf,jpg,jpeg|max:2048',
                'ijazah' => 'required|file|mimes:pdf,jpg,jpeg|max:2048',
                'akta'   => 'required|file|mimes:pdf,jpg,jpeg|max:2048',

                // Dokumen opsional
                'kip'    => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
                'pkh'    => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
                'sktm'   => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
            ], [
                // Pesan error custom
                'kk.required'     => 'File Kartu Keluarga wajib diunggah.',
                'kk.mimes'        => 'Format KK harus PDF atau JPG.',
                'kk.max'          => 'Ukuran file KK maksimal 2MB.',

                'ijazah.required' => 'File Ijazah wajib diunggah.',
                'ijazah.mimes'    => 'Format Ijazah harus PDF atau JPG.',
                'ijazah.max'      => 'Ukuran file Ijazah maksimal 2MB.',

                'akta.required'   => 'File Akta Kelahiran wajib diunggah.',
                'akta.mimes'      => 'Format Akta harus PDF atau JPG.',
                'akta.max'        => 'Ukuran file Akta maksimal 2MB.',

                'kip.mimes'       => 'Format KIP harus PDF atau JPG.',
                'kip.max'         => 'Ukuran file KIP maksimal 2MB.',

                'pkh.mimes'       => 'Format PKH harus PDF atau JPG.',
                'pkh.max'         => 'Ukuran file PKH maksimal 2MB.',

                'sktm.mimes'      => 'Format SKTM harus PDF atau JPG.',
                'sktm.max'        => 'Ukuran file SKTM maksimal 2MB.',
            ]);
        }


        $paths = [];

        foreach ($validated as $key => $file) {
            if ($request->hasFile($key)) {
                // dump($key);
                $paths[$key] = $request->file($key)->storeAs("dokumen/" . auth()->user()->username, $key . '-' . auth()->user()->name . '.' . $file->getClientOriginalExtension(), 'public');
            }
        }

        // dump(auth()->user()->daftarCalonSiswa->id);
        // dump($paths);
        // dd($paths['kip']);
        // Simpan ke database (misalnya tabel ub_dokumen)
        $dokumen = daftarBerkas::updateOrCreate([
            'daftar_calon_siswa_id' =>  auth()->user()->daftarCalonSiswa->id
        ], [
            'daftar_calon_siswa_id' => auth()->user()->daftarCalonSiswa->id,
            'kk'      => $paths['kk'] ?? auth()->user()->daftarCalonSiswa->berkas->kk,
            'ijazah'  => $paths['ijazah'] ?? auth()->user()->daftarCalonSiswa->berkas->ijazah,
            'akte'    => $paths['akta'] ?? auth()->user()->daftarCalonSiswa->berkas->akte,
            'KIP' => $paths['kip'] ?? auth()->user()->daftarCalonSiswa->berkas->KIP,
            'PKH' => $paths['pkh'] ?? auth()->user()->daftarCalonSiswa->berkas->PKH,
            'SKTM'    => $paths['sktm'] ?? auth()->user()->daftarCalonSiswa->berkas->SKTM,
            'status'  => true,
        ]);
        return redirect()->route('ub.index')->with('success', 'Dokumen berhasil diunggah.');
    }

    /**
     * Display the specified resource.
     */
    public function show(daftarBerkas $daftarBerkas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(daftarBerkas $daftarBerkas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, daftarBerkas $daftarBerkas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(daftarBerkas $daftarBerkas)
    {
        //
    }
}
