@extends('portal-pendaftran.main')
@section('tempalte')
    <div class="bg-white rounded-xl shadow-2xl p-8 md:p-12 max-w-4xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 border-b pb-4">Status Kelulusan & Jadwal MPLS</h2>
        @if ($siswa->lulus)
            {{-- Status Lolos --}}
            <div id="status-lolos" class="mb-10">
                <div class="p-6 md:p-8 rounded-xl border-4 border-emerald-600 bg-emerald-50 text-center mb-10">
                    <h3 class="text-3xl font-extrabold text-emerald-700 mb-2">🎉 SELAMAT! Anda Dinyatakan LULUS</h3>
                    <p class="text-lg text-emerald-600">Anda resmi menjadi Calon Siswa SMK Islam 1 Durenan Angkatan
                        2025/2026.
                        Lanjut ke Tahap Maping Kelas & MPLS (Tahap 6 & 7).</p>
                </div>


                {{-- Maping Kelas & Absensi --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="p-5 border border-gray-200 rounded-lg shadow-md">
                        <h4 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <span class="text-emerald-500">📍</span> Maping Kelas MPLS (Tahap 6)
                        </h4>
                        <table class="w-full text-left text-gray-600">
                            <tr>
                                <td class="py-1 font-semibold">Jurusan:</td>
                                <td class="py-1 text-gray-800 font-bold">Teknik Komputer & Jaringan (TKJ)</td>
                            </tr>
                            <tr>
                                <td class="py-1 font-semibold">Kelas MPLS:</td>
                                <td class="py-1 text-gray-800 font-bold text-2xl">X TKJ - 3</td>
                            </tr>
                            <tr>
                                <td class="py-1 font-semibold">Grup WA:</td>
                                <td class="py-1"><a href="#" class="text-blue-500 hover:underline">Link Grup Kelas X
                                        TKJ-3</a></td>
                            </tr>
                        </table>
                    </div>

                    <div class="p-5 border border-gray-200 rounded-lg shadow-md">
                        <h4 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <span class="text-emerald-500">🔗</span> Absensi MPLS Online (Tahap 7)
                        </h4>
                        <p class="text-sm text-gray-600 mb-3">Absensi akan dibuka sesuai jadwal. Anda hanya bisa mengakses
                            absensi kelas yang telah ditentukan.</p>
                        <p class="text-lg font-bold text-red-600">Jadwal MPLS: 15 - 17 Juli 2025</p>
                        <button
                            class="mt-4 w-full py-3 bg-red-500 text-white font-bold rounded-lg hover:bg-red-600 transition"
                            disabled>
                            Link Absensi (Belum Dibuka)
                        </button>
                    </div> {{-- end grid Maping & Absensi --}}
                </div> {{-- end status-lolos --}}

            </div>
        @else
            {{-- Status Verifikasi --}}
            <div id="status-verifikasi"
                class="p-6 md:p-8 rounded-xl border-4 border-yellow-400 bg-yellow-50 text-center mb-8">
                <h3 class="text-2xl font-bold text-yellow-800 mb-2">⏳ Dalam Proses Verifikasi Dokumen (Tahap 5)</h3>
                <p class="text-yellow-700">Dokumen Anda (KK, Ijazah, Akte, dll.) telah diterima dan sedang diperiksa oleh
                    Tim
                    PPDB dan Kesiswaan. Mohon tunggu pengumuman hasil.</p>
                <p class="mt-4 text-sm font-semibold">Perkiraan Waktu Proses: Maksimal 3 Hari Kerja.</p>
            </div>
            {{-- Biodata Siswa --}}
            <div class="p-6 mb-8 border border-gray-200 rounded-lg shadow-md bg-gray-50">
                <h4 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fa fa-user text-emerald-500"></i> Biodata Siswa
                </h4>
                <table class="w-full text-left text-gray-600">
                    <tr>
                        <td class="py-1 font-semibold">Nama Lengkap:</td>
                        <td class="py-1 text-gray-800 font-bold">{{ $siswa->nama }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-semibold">NISN:</td>
                        <td class="py-1 text-gray-800 font-bold">{{ $siswa->nisn }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-semibold">Tempat, Tanggal Lahir:</td>
                        <td class="py-1 text-gray-800">{{ $siswa->tempat_lahir }},
                            {{ $siswa->tanggal_lahir?->format('d-m-Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="py-1 font-semibold">Jenis Kelamin:</td>
                        <td class="py-1 text-gray-800">{{ $siswa->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-semibold">Agama:</td>
                        <td class="py-1 text-gray-800">{{ $siswa->agama }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-semibold">Alamat:</td>
                        <td class="py-1 text-gray-800">{{ $siswa->alamat_calon_peserta_didik }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-semibold">Status dalam Keluarga:</td>
                        <td class="py-1 text-gray-800">{{ $siswa->status_dalam_keluarga }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-semibold">Nomor Telepon Aktif:</td>
                        <td class="py-1 text-gray-800">{{ $siswa->nomor_telepon_aktif }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-semibold">Email Aktif:</td>
                        <td class="py-1 text-gray-800">{{ $siswa->email_aktif }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-semibold">Nama Ayah:</td>
                        <td class="py-1 text-gray-800">{{ $siswa->nama_ayah }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-semibold">Pekerjaan Ayah:</td>
                        <td class="py-1 text-gray-800">{{ $siswa->pekerjaan_ayah }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-semibold">Nama Ibu:</td>
                        <td class="py-1 text-gray-800">{{ $siswa->nama_ibu }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-semibold">Pekerjaan Ibu:</td>
                        <td class="py-1 text-gray-800">{{ $siswa->pekerjaan_ibu }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-semibold">Nama Wali:</td>
                        <td class="py-1 text-gray-800">{{ $siswa->nama_wali }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-semibold">Alamat Wali:</td>
                        <td class="py-1 text-gray-800">{{ $siswa->alamat_wali_calon_peserta_didik }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-semibold">Jurusan Pilihan:</td>
                        <td class="py-1 text-gray-800">{{ $siswa->jurusan1->nama_jurusan }} /
                            {{ $siswa->jurusan2->nama_jurusan }}</td>
                    </tr>

                </table>
            </div>

            {{-- Berkas Upload --}}
            <div class="p-6 mb-8 border border-gray-200 rounded-lg shadow-md bg-gray-50">
                <h4 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fa fa-folder-open text-emerald-500"></i> Berkas yang Diupload
                </h4>
                <ul class="space-y-2 text-gray-700">
                    <li><i class="fa fa-id-card text-emerald-500"></i> KK:
                        @if (!empty($siswa->berkas->kk))
                            <a href="{{ asset('storage/' . $siswa->berkas->kk) }}" target="_blank"
                                class="text-blue-600 hover:underline">Lihat File</a>
                        @else
                            <span class="text-red-500">Belum diupload</span>
                        @endif
                    </li>
                    <li><i class="fa fa-graduation-cap text-emerald-500"></i> Ijazah:
                        @if (!empty($siswa->berkas->ijazah))
                            <a href="{{ asset('storage/' . $siswa->berkas->ijazah) }}" target="_blank"
                                class="text-blue-600 hover:underline">Lihat File</a>
                        @else
                            <span class="text-red-500">Belum diupload</span>
                        @endif
                    </li>
                    <li><i class="fa fa-baby text-emerald-500"></i> Akta:
                        @if (!empty($siswa->berkas->akte))
                            <a href="{{ asset('storage/' . $siswa->berkas->akte) }}" target="_blank"
                                class="text-blue-600 hover:underline">Lihat File</a>
                        @else
                            <span class="text-red-500">Belum diupload</span>
                        @endif
                    </li>
                    <li><i class="fa fa-credit-card text-emerald-500"></i> KIP:
                        @if (!empty($siswa->berkas->KIP))
                            <a href="{{ asset('storage/' . $siswa->berkas->KIP) }}" target="_blank"
                                class="text-blue-600 hover:underline">Lihat File</a>
                        @else
                            <span class="text-gray-400">Opsional</span>
                        @endif
                    </li>
                    <li><i class="fa fa-hand-holding-heart text-emerald-500"></i> PKH:
                        @if (!empty($siswa->berkas->PKH))
                            <a href="{{ asset('storage/' . $siswa->berkas->PKH) }}" target="_blank"
                                class="text-blue-600 hover:underline">Lihat File</a>
                        @else
                            <span class="text-gray-400">Opsional</span>
                        @endif
                    </li>
                    <li><i class="fa fa-file-alt text-emerald-500"></i> SKTM:
                        @if (!empty($siswa->berkas->SKTM))
                            <a href="{{ asset('storage/' . $siswa->berkas->SKTM) }}" target="_blank"
                                class="text-blue-600 hover:underline">Lihat File</a>
                        @else
                            <span class="text-gray-400">Opsional</span>
                        @endif
                    </li>
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('logout') }}" class="w-full">
            <div class="flex justify-center items-center mb-8 border-b pb-4">
                <a class="px-6 py-2 bg-emerald-600 text-white font-semibold rounded-lg shadow hover:bg-emerald-700 transition m-auto"
                    href="{{ route('bukti-daftar') }}">Cetak Bukti Pendaftaran</a>
                @csrf
                <button class="text-sm text-gray-500 hover:text-red-600 font-semibold flex items-center gap-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    Logout
                </button>

            </div>
        </form>
    </div>

@endsection
