@extends('portal-pendaftran.main')
@section('tempalte')
    <div class="bg-white rounded-xl shadow-2xl p-8 md:p-12 max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-3 text-center">1. Pendaftaran Awal (Akun)</h2>
        <p class="text-gray-600 mb-8 text-center">Isi data di bawah untuk mendapatkan <strong>Username &
                Password</strong>
            via
            WA/Email (Tahap 2).</p>
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-800 p-4 rounded-lg mb-6">
                <div class="flex items-start">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0 text-red-600" fill="currentColor" viewBox="0 0 20 20"
                        aria-hidden="true"></svg>
                    <path fill-rule="evenodd"
                        d="M8.257 3.099c.765-1.36 2.72-1.36 3.485 0l6.518 11.59c.75 1.335-.213 2.981-1.742 2.981H3.48c-1.53 0-2.492-1.646-1.742-2.98L8.257 3.1zM11 13a1 1 0 10-2 0 1 1 0 002 0zm-1-8a1 1 0 00-.993.883L9 6v4a1 1 0 001.993.117L11 10V6a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                    </svg>
                    <div>
                        <p class="font-semibold">Terdapat kesalahan:</p>
                        <ul class="mt-2 list-disc list-inside space-y-1 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        @session('success')
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-lg mb-6">
                <div class="flex items-start">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <div>
                        <p class="font-semibold">Sukses!</p>
                        <p class="mt-2 text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endsession

        <form id="form-register" class="space-y-6" action="{{ route('spmb.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="reg_nama" name="nama" placeholder="Nama Sesuai Ijazah"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500"
                        value="{{ old('nama') }}">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                    <div class="mt-2 space-y-2">
                        <div class="flex items-center">
                            <input type="radio" id="laki" name="jenisKelamin" value="L"
                                class="w-4 h-4 text-emerald-600 border-gray-300 focus:ring-emerald-500"
                                {{ old('jenisKelamin') == 'L' ? 'checked' : '' }}>
                            <label for="laki" class="ml-2 text-sm text-gray-700">Laki-laki</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="perempuan" name="jenisKelamin" value="P"
                                class="w-4 h-4 text-emerald-600 border-gray-300 focus:ring-emerald-500"
                                {{ old('jenisKelamin') == 'P' ? 'checked' : '' }}>
                            <label for="perempuan" class="ml-2 text-sm text-gray-700">Perempuan</label>
                        </div>
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Asal Sekolah SMP/MTs</label>
                    <input type="text" id="reg_sekolah" name="asalSekolah" placeholder="Contoh: SMPN 1 Durenan"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500"
                        value="{{ old('asalSekolah') }}">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">NISN</label>
                    <input type="number" id="reg_nis" name="nisn" placeholder="Nomor Induk Siswa Nasional"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500"
                        value="{{ old('nisn') }}">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Pilihan Jurusan 1 (Utama)</label>
                    <select id="reg_jurusan1" name="jurusan_satu"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-emerald-500 focus:border-emerald-500"
                        value="{{ old('jurusan_satu') }}">
                        @forelse($jurusan as $j)
                            <option value="{{ $j->kode_jurusan }}">{{ $j->nama_jurusan }}</option>
                        @empty
                            <option value="" selected disabled>-- Pilih Jurusan --</option>
                        @endforelse
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Pilihan Jurusan 2 (Alternatif)</label>
                    <select id="reg_jurusan2" name="jurusan_dua"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-emerald-500 focus:border-emerald-500"
                        value="{{ old('jurusan_dua') }}">
                        @forelse($jurusan as $j)
                            <option value="{{ $j->kode_jurusan }}">{{ $j->nama_jurusan }}</option>
                        @empty
                            <option value="" selected disabled>-- Pilih Jurusan --</option>
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Informasi Pendaftaran</label>
                    <select id="reg_informan_select" name="status"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-emerald-500 focus:border-emerald-500"
                        value="{{ old('status') }}">
                        <option value="" selected disabled>-- Pilih Informan --</option>
                        <option value="guru">Guru</option>
                        <option value="Teman">Teman</option>
                        <option value="Sosial Media">Sosial Media</option>
                        <option value="Lain">Lainnya</option>
                    </select>

                </div>
                <div class="hidden" id="reg_informan_div">
                    <label class="block text-sm font-medium text-gray-700">Nama Pemberi Informasi</label>
                    <select id="reg_informan" name="infromen_id"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-emerald-500 focus:border-emerald-500 hidden">
                        @forelse($informan as $j)
                            <option value="{{ $j->id }}" @if (old('infromen_id') == $j->id) selected @endif>
                                {{ $j->nama_informan }}</option>
                        @empty
                            <option value="" selected disabled>-- Pilih Jurusan --</option>
                        @endforelse
                    </select>
                    <input type="text" id="reg_informan_text" name="infromen_id_text"
                        placeholder="Masukan Nama Informan"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 hidden"
                        value="{{ old('infromen_id_text') }}">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nomor WhatsApp Aktif</label>
                    <input type="tel" id="reg_wa" name="wa" placeholder="Cth: 0812xxxx"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500"
                        value="{{ old('wa') }}">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email Aktif</label>
                    <input type="email" id="reg_email" name="email" placeholder="Cth: example@mail.com"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500"
                        value="{{ old('email') }}">
                </div>
            </div>

    </div>

    <div class="flex justify-center pt-4">
        <button type="submit"
            class="w-full sm:w-auto px-8 py-3 bg-emerald-600 text-white font-bold rounded-lg hover:bg-emerald-700 transition shadow-lg shadow-emerald-200">
            Daftar & Dapatkan Akun
        </button>
    </div>
    </form>
    </div>
@endsection
