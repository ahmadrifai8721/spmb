@extends('portal-pendaftran.main')

@section('tempalte')
    <div class="bg-white rounded-xl shadow-2xl p-8 md:p-12 max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-3">
            Lengkapi Biodata Calon Siswa Baru (Tahap 3)
        </h2>
        <p class="text-gray-600 mb-8">
            Pastikan semua data diisi dengan benar. Data ini akan menjadi dasar identitas Anda.
        </p>
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

        <form id="form-biodata" class="space-y-6" action="{{ route('du.update', $data->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="space-y-8">
                <fieldset class="border border-gray-200 p-5 rounded-lg bg-gray-50">
                    <legend class="text-lg font-semibold text-gray-500 px-2">Informasi Akun</legend>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-2">

                        {{-- nomor_telepon_aktif --}}
                        <div class="flex flex-col">
                            <label for="nomor_telepon_aktif" class="text-sm font-medium text-gray-700 mb-1">Nomer
                                Whatsapp</label>
                            <input id="nomor_telepon_aktif" type="text"
                                value="{{ old('nomor_telepon_aktif', $data->nomor_telepon_aktif ?? '') }}" disabled
                                class="px-4 py-2 border rounded-lg bg-gray-200 text-gray-500 cursor-not-allowed">
                        </div>

                        {{-- email_aktif --}}
                        <div class="flex flex-col">
                            <label for="email_aktif" class="text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input id="email_aktif" type="text"
                                value="{{ old('email_aktif', $data->email_aktif ?? '') }}" disabled
                                class="px-4 py-2 border rounded-lg bg-gray-200 text-gray-500 cursor-not-allowed">
                        </div>

                        {{-- NISN --}}
                        <div class="flex flex-col">
                            <label for="nisn" class="text-sm font-medium text-gray-700 mb-1">NISN</label>
                            <input id="nisn" type="text" value="{{ old('nisn', $data->nisn ?? '') }}" disabled
                                class="px-4 py-2 border rounded-lg bg-gray-200 text-gray-500 cursor-not-allowed">
                        </div>
                    </div>
                </fieldset>

                <fieldset class="border border-gray-200 p-5 rounded-lg bg-white">
                    <legend class="text-lg font-semibold text-emerald-600 px-2">Biodata Diri</legend>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-2">

                        {{-- Nama Lengkap --}}
                        <div class="flex flex-col md:col-span-3 lg:col-span-1">
                            <label for="nama" class="text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input id="nama" type="text" placeholder="Nama" name="nama"
                                value="{{ old('nama', $data->nama ?? '') }}" required
                                class="px-4 py-2 border rounded-lg peer @error('nama') border-red-500 @enderror invalid:border-red-500 focus:invalid:border-red-500">
                            @error('nama')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Jenis Kelamin --}}
                        <div class="flex flex-col">
                            <label for="jenisKelamin" class="text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                            <select id="jenisKelamin" name="jenisKelamin" required
                                class="px-4 py-2 border rounded-lg bg-white peer @error('jenisKelamin') border-red-500 @enderror">
                                <option value="">Jenis Kelamin</option>
                                <option value="L"
                                    {{ old('jenisKelamin', $data->jenis_kelamin ?? '') === 'L' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="P"
                                    {{ old('jenisKelamin', $data->jenis_kelamin ?? '') === 'P' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Agama --}}
                        <div class="flex flex-col">
                            <label for="agama" class="text-sm font-medium text-gray-700 mb-1">Agama</label>
                            <select id="agama" name="agama" required
                                class="px-4 py-2 border rounded-lg bg-white peer @error('agama') border-red-500 @enderror">
                                <option value="">Agama</option>
                                <option value="Islam"
                                    {{ old('agama', $data->agama ?? '') === 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen"
                                    {{ old('agama', $data->agama ?? '') === 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Katholik"
                                    {{ old('agama', $data->agama ?? '') === 'Katholik' ? 'selected' : '' }}>Katholik
                                </option>
                                <option value="Hindu"
                                    {{ old('agama', $data->agama ?? '') === 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha"
                                    {{ old('agama', $data->agama ?? '') === 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Konghu Chu"
                                    {{ old('agama', $data->agama ?? '') === 'Konghu Chu' ? 'selected' : '' }}>Konghu
                                    Chu</option>
                            </select>
                            @error('agama')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Tempat Lahir --}}
                        <div class="flex flex-col">
                            <label for="tempat_lahir" class="text-sm font-medium text-gray-700 mb-1">Tempat Lahir</label>
                            <input id="tempat_lahir" type="text" placeholder="Tempat Lahir" name="tempat_lahir"
                                value="{{ old('tempat_lahir', $data->tempat_lahir ?? '') }}" required
                                class="px-4 py-2 border rounded-lg peer invalid:border-red-500 focus:invalid:border-red-500 @error('tempat_lahir') border-red-500 @enderror">
                            @error('tempat_lahir')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Tanggal Lahir --}}
                        <div class="flex flex-col">
                            <label for="tanggal_lahir" class="text-sm font-medium text-gray-700 mb-1">Tanggal
                                Lahir</label>
                            <input id="tanggal_lahir" type="date" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir', optional($data->tanggal_lahir)->format('Y-m-d')) }}"
                                required
                                class="px-4 py-2 border invalid:border-red-500 rounded-lg peer @error('tanggal_lahir') border-red-500 @enderror">
                            @error('tanggal_lahir')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Status Dalam keluarga --}}
                        <div class="flex flex-col">
                            <label for="status_dalam_keluarga" class="text-sm font-medium text-gray-700 mb-1">Status Dalam
                                Keluarga</label>
                            <select id="status_dalam_keluarga" name="status_dalam_keluarga" required
                                class="px-4 py-2 border rounded-lg bg-white peer @error('status_dalam_keluarga')border-red-500 @enderror">
                                <option value="">Status Dalam Keluarga</option>
                                <option value="Anak Kandung"
                                    {{ old('status_dalam_keluarga', $data->status_dalam_keluarga ?? '') === 'Anak Kandung' ? 'selected' : '' }}>
                                    Anak Kandung</option>
                                <option value="Anak Tiri"
                                    {{ old('status_dalam_keluarga', $data->status_dalam_keluarga ?? '') === 'Anak Tiri' ? 'selected' : '' }}>
                                    Anak Tiri</option>
                                <option value="Anak Angkat"
                                    {{ old('status_dalam_keluarga', $data->status_dalam_keluarga ?? '') === 'Anak Angkat' ? 'selected' : '' }}>
                                    Anak Angkat</option>
                            </select>
                            @error('status_dalam_keluarga')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Alamat --}}
                        <div class="flex flex-col md:col-span-3">
                            <label for="alamat_calon_peserta_didik" class="text-sm font-medium text-gray-700 mb-1">Alamat
                                Lengkap Saat Ini</label>
                            <textarea id="alamat_calon_peserta_didik" placeholder="Nama Jalan, RT/RW, Dusun, Kelurahan..."
                                name="alamat_calon_peserta_didik" required rows="2"
                                class="col-span-3 px-4  py-2 border invalid:border-red-500 rounded-lg peer @error('alamat_calon_peserta_didik') border-red-500 @enderror">{{ old('alamat_calon_peserta_didik', $data->alamat_calon_peserta_didik ?? '') }}</textarea>
                            @error('alamat_calon_peserta_didik')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </fieldset>

                <fieldset class="border border-gray-200 p-5 rounded-lg bg-white">
                    <legend class="text-lg font-semibold text-emerald-600 px-2">Data Akademik</legend>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-2">

                        {{-- Asal Sekolah --}}
                        <div class="flex flex-col">
                            <label for="asal_sekolah" class="text-sm font-medium text-gray-700 mb-1">Asal Sekolah</label>
                            <input id="asal_sekolah" type="text" placeholder="Asal Sekolah" name="asal_sekolah"
                                value="{{ old('asal_sekolah', $data->asal_sekolah_smp_mts ?? '') }}" required
                                class="px-4 py-2 border invalid:border-red-500 rounded-lg peer @error('asal_sekolah') border-red-500 @enderror">
                            @error('asal_sekolah')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Pilihan Jurusan 1 --}}
                        <div class="flex flex-col">
                            <label for="reg_jurusan1" class="text-sm font-medium text-gray-700 mb-1">Pilihan Jurusan
                                1</label>
                            <input type="hidden" name="jurusan_satu"
                                value="{{ old('jurusan_satu', $data->jurusan_satu ?? '') }}">
                            <select @if (!$data->editJurusan) disabled @endif name="jurusan_satu"
                                id="reg_jurusan1"
                                class="px-4 py-2 border rounded-lg bg-white peer @error('jurusan_satu') border-red-500 @enderror">
                                <option value="">Pilihan Jurusan 1</option>
                                @forelse($jurusan as $j)
                                    <option value="{{ $j->kode_jurusan }}"
                                        {{ old('jurusan_satu', $data->jurusan_satu ?? '') === $j->kode_jurusan ? 'selected' : '' }}>
                                        {{ $j->nama_jurusan }}
                                    </option>
                                @empty
                                    <option value="" disabled>-- Pilih Jurusan --</option>
                                @endforelse
                            </select>
                            @if (!$data->editJurusan)
                                <p class="mt-1 text-xs text-red-500">Jurusan Sudah Terkunci Silahkan Hubungi Admin</p>
                            @endif
                            @error('jurusan_satu')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Pilihan Jurusan 2 --}}
                        <div class="flex flex-col">
                            <label for="reg_jurusan2" class="text-sm font-medium text-gray-700 mb-1">Pilihan Jurusan
                                2</label>
                            <input type="hidden" name="jurusan_dua"
                                value="{{ old('jurusan_dua', $data->jurusan_dua ?? '') }}">
                            <select @if (!$data->editJurusan) disabled @endif name="jurusan_dua" id="reg_jurusan2"
                                class="px-4 py-2 border rounded-lg bg-white peer @error('jurusan_dua') border-red-500 @enderror">
                                <option value="">Pilihan Jurusan 2</option>
                                @forelse($jurusan as $j)
                                    <option value="{{ $j->kode_jurusan }}"
                                        {{ old('jurusan_dua', $data->jurusan_dua ?? '') === $j->kode_jurusan ? 'selected' : '' }}>
                                        {{ $j->nama_jurusan }}
                                    </option>
                                @empty
                                    <option value="" disabled>-- Pilih Jurusan --</option>
                                @endforelse
                            </select>
                            @if (!$data->editJurusan)
                                <p class="mt-1 text-xs text-red-500">Jurusan Sudah Terkunci Silahkan Hubungi Admin</p>
                            @endif
                            @error('jurusan_dua')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </fieldset>

                <fieldset class="border border-gray-200 p-5 rounded-lg bg-white">
                    <legend class="text-lg font-semibold text-emerald-600 px-2">Data Orang Tua/Wali</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">

                        {{-- Ayah --}}
                        <div class="flex flex-col">
                            <label for="nama_ayah" class="text-sm font-medium text-gray-700 mb-1">Nama Ayah</label>
                            <input id="nama_ayah" type="text" placeholder="Nama Ayah" name="nama_ayah"
                                value="{{ old('nama_ayah', $data->nama_ayah ?? '') }}" required
                                class="px-4 py-2 border invalid:border-red-500 rounded-lg peer @error('nama_ayah') border-red-500 @enderror">
                            @error('nama_ayah')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-col">
                            <label for="pekerjaan_ayah" class="text-sm font-medium text-gray-700 mb-1">Pekerjaan
                                Ayah</label>
                            <input id="pekerjaan_ayah" type="text" placeholder="Pekerjaan Ayah" name="pekerjaan_ayah"
                                value="{{ old('pekerjaan_ayah', $data->pekerjaan_ayah ?? '') }}" required
                                class="px-4 py-2 border invalid:border-red-500 rounded-lg peer @error('pekerjaan_ayah') border-red-500 @enderror">
                            @error('pekerjaan_ayah')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Ibu --}}
                        <div class="flex flex-col">
                            <label for="nama_ibu" class="text-sm font-medium text-gray-700 mb-1">Nama Ibu</label>
                            <input id="nama_ibu" type="text" placeholder="Nama Ibu" name="nama_ibu"
                                value="{{ old('nama_ibu', $data->nama_ibu ?? '') }}" required
                                class="px-4 py-2 border invalid:border-red-500 rounded-lg peer @error('nama_ibu') border-red-500 @enderror">
                            @error('nama_ibu')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-col">
                            <label for="pekerjaan_ibu" class="text-sm font-medium text-gray-700 mb-1">Pekerjaan
                                Ibu</label>
                            <input id="pekerjaan_ibu" type="text" placeholder="Pekerjaan Ibu" name="pekerjaan_ibu"
                                value="{{ old('pekerjaan_ibu', $data->pekerjaan_ibu ?? '') }}" required
                                class="px-4 py-2 border invalid:border-red-500 rounded-lg peer @error('pekerjaan_ibu') border-red-500 @enderror">
                            @error('pekerjaan_ibu')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Wali --}}
                        <div class="flex flex-col">
                            <label for="nama_wali" class="text-sm font-medium text-gray-700 mb-1">Nama Wali
                                (Opsional)</label>
                            <input id="nama_wali" type="text" placeholder="Nama Wali" name="nama_wali"
                                value="{{ old('nama_wali', $data->nama_wali ?? '') }}"
                                class="px-4 py-2 border invalid:border-red-500 rounded-lg peer @error('nama_wali') border-red-500 @enderror">
                            @error('nama_wali')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-col">
                            <label for="alamat_wali_calon_peserta_didik"
                                class="text-sm font-medium text-gray-700 mb-1">Alamat/Telp Wali</label>
                            <input id="alamat_wali_calon_peserta_didik" type="text" placeholder="Alamat/Telp Wali"
                                name="alamat_wali_calon_peserta_didik"
                                value="{{ old('alamat_wali_calon_peserta_didik', $data->alamat_wali_calon_peserta_didik ?? '') }}"
                                class="px-4 py-2 border invalid:border-red-500 rounded-lg peer @error('alamat_wali_calon_peserta_didik') border-red-500 @enderror">
                            @error('alamat_wali_calon_peserta_didik')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </fieldset>

            </div>

            <!-- Button Actions -->
            <div class="flex justify-between pt-4">
                <a href="{{ route('du.index') }}">
                    <button type="button"
                        class="px-6 py-3 bg-gray-400 text-white font-bold rounded-lg hover:bg-gray-500 transition">
                        Batal / Kembali
                    </button>
                </a>
                <button type="submit"
                    class="px-8 py-3 bg-teal-600 text-white font-bold rounded-lg hover:bg-teal-700 transition shadow-lg shadow-teal-200">
                    Kirim Semua Dokumen
                </button>
            </div>
        </form>
    </div>
@endsection
