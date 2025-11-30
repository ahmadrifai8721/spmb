<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Bukti Pendaftaran Online PPDB</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        @media print {
            body {
                background: #fff !important;
                margin: 0;
                padding: 0;
            }

            .print-container {
                box-shadow: none !important;
                border: none !important;
                max-width: 100% !important;
                padding: 0 !important;
            }

            .no-print {
                display: none !important;
            }

            /* table {
                border: 1px solid #000 !important;
                border-collapse: collapse !important;
                width: 100%;
            }

            table td {
                border: 1px solid #000 !important;
                padding: 6px !important;
            } */
        }
    </style>
</head>

<body class="bg-gray-100 py-10">
    <div class="print-container max-w-3xl mx-auto bg-white rounded-xl shadow-xl border border-emerald-200 p-8">

        <!-- Header dengan Logo -->
        <div class="flex items-center justify-center mb-6 border-b pb-4">
            <img src="{{ url('/') }}/assets/img/KOP SMK ISLAM BARU.jpg" alt="Kop Sekolah" class="w-full">
        </div>

        <!-- Judul -->
        <h2 class="text-2xl font-bold text-center text-emerald-700 mb-6 uppercase">
            Bukti Pendaftaran Online PPDB<br>Tahun Pelajaran 2025/2026
        </h2>

        <!-- Tabel Data -->
        <table class="w-full text-sm text-gray-700 border border-gray-300 rounded-lg overflow-hidden shadow-sm">
            <tbody>
                <tr>
                    <td class="py-2 px-4 font-semibold w-1/3">Nomor Pendaftaran</td>
                    <td class="py-2 px-4">{{ auth()->user()->daftarCalonSiswa->id }}</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 font-semibold">Waktu Pendaftaran</td>
                    <td class="py-2 px-4">{{ auth()->user()->daftarCalonSiswa->created_at->format('d F Y H:i:s') }}
                    </td>
                </tr>
                <tr>
                    <td class="py-2 px-4 font-semibold">Nama</td>
                    <td class="py-2 px-4">{{ auth()->user()->daftarCalonSiswa->nama }}</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 font-semibold">NISN</td>
                    <td class="py-2 px-4">{{ auth()->user()->daftarCalonSiswa->nisn }}</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 font-semibold">Jenis Kelamin</td>
                    <td class="py-2 px-4">{{ auth()->user()->daftarCalonSiswa->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 font-semibold">Tempat Tanggal Lahir</td>
                    <td class="py-2 px-4">{{ auth()->user()->daftarCalonSiswa->tempat_lahir }} /
                        {{ auth()->user()->daftarCalonSiswa->tanggal_lahir?->format('d F Y') }}</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 font-semibold">Asal Sekolah</td>
                    <td class="py-2 px-4">{{ auth()->user()->daftarCalonSiswa->asal_sekolah_smp_mts }}</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 font-semibold">Pilihan Pertama</td>
                    <td class="py-2 px-4">{{ auth()->user()->daftarCalonSiswa->jurusan1->nama_jurusan }}</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 font-semibold">Pilihan Kedua</td>
                    <td class="py-2 px-4">{{ auth()->user()->daftarCalonSiswa->jurusan2->nama_jurusan }}</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 font-semibold">Informan</td>
                    <td class="py-2 px-4">
                        <strong>{{ auth()->user()->daftarCalonSiswa->infromen->nama_informan }}</strong> ( Dari
                        {{ auth()->user()->daftarCalonSiswa->infromen->status }} )
                    </td>
                </tr>
                <tr>
                    <td class="py-2 px-4 font-semibold">Informasi Nomor WA</td>
                    <td class="py-2 px-4">089515648089</td>
                </tr>
            </tbody>
        </table>

        <!-- Footer -->
        <div class="mt-6 text-center text-gray-700 text-sm bg-emerald-50 border border-emerald-200 rounded-lg p-4">
            <p class="font-semibold">✅ Selamat Anda Berhasil Melakukan Pendaftaran secara Online sebagai Calon Peserta
                Didik di SMK Islam 1 Durenan.</p>
            <p class="mt-2">Gunakan bukti pendaftaran ini untuk daftar ulang yang akan diinformasikan melalui nomor
                WhatsApp yang Anda sertakan.</p>
        </div>

        <!-- Signature -->
        <div class="mt-10 ml-100 text-center">
            <p class="text-gray-700">Panitia Pendaftaran</p>
            <p class="text-gray-700">Ketua,</p>
            <div class="mt-12">
                <p class="font-bold text-gray-800">Drs. H. Suwoto Afandi</p>
            </div>
        </div>

        <!-- Tombol Cetak -->
        <div class="mt-8 text-center no-print">
            <button onclick="window.print()"
                class="px-6 py-2 bg-emerald-600 text-white font-semibold rounded-lg shadow hover:bg-emerald-700 transition">
                <i class="fa fa-print"></i> Cetak Bukti Pendaftaran
            </button>
        </div>
    </div>
</body>

</html>
