@extends('portal-pendaftran.main')
@section('tempalte')
    <div class="bg-white rounded-xl shadow-2xl p-8 md:p-12 max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-3">
            Upload Dokumen Daftar Ulang (Tahap 4)
        </h2>
        <p class="text-gray-600 mb-8">
            Unggah scan atau foto dokumen dengan format PDF/JPG. Ukuran maksimal 2MB per file.
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

        <form id="form-upload" class="space-y-6" action="{{ route('ub.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            {{-- Dokumen Wajib --}}
            <fieldset class="border border-emerald-300 p-5 rounded-lg bg-emerald-50">
                <legend class="text-lg font-bold text-emerald-700 px-2">Dokumen Wajib</legend>
                <div class="space-y-4 mt-4">

                    {{-- KK --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                        <label class="font-medium text-gray-700"><i class="fa fa-id-card"></i> Scan Kartu Keluarga
                            (KK)</label>
                        <div class="flex items-center gap-3">
                            <input type="file" name="kk" @if (empty($dokumen->kk)) required @endif
                                accept=".pdf,.jpg,.jpeg"
                                class="block w-full text-sm text-gray-500
                           file:mr-4 file:py-2 file:px-4
                           file:rounded-full file:border-0
                           file:text-sm file:font-semibold
                           file:bg-emerald-100 file:text-emerald-700
                           hover:file:bg-emerald-200 transition">
                            @if (!empty($dokumen->kk))
                                <a href="{{ asset('storage/' . $dokumen->kk) }}" target="_blank"
                                    class="px-4 py-2 rounded-full text-sm font-semibold
                              bg-emerald-100 text-emerald-700
                              hover:bg-emerald-200 transition flex items-center gap-2">
                                    <i class="fa fa-eye"></i>
                                </a>
                            @endif
                        </div>
                    </div>

                    {{-- Ijazah --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                        <label class="font-medium text-gray-700"><i class="fa fa-graduation-cap"></i> Scan Ijazah SMP/MTs
                            (atau SKL)</label>
                        <div class="flex items-center gap-3">
                            <input type="file" name="ijazah" @if (empty($dokumen->ijazah)) required @endif
                                accept=".pdf,.jpg,.jpeg"
                                class="block w-full text-sm text-gray-500
                           file:mr-4 file:py-2 file:px-4
                           file:rounded-full file:border-0
                           file:text-sm file:font-semibold
                           file:bg-emerald-100 file:text-emerald-700
                           hover:file:bg-emerald-200 transition">
                            @if (!empty($dokumen->ijazah))
                                <a href="{{ asset('storage/' . $dokumen->ijazah) }}" target="_blank"
                                    class="px-4 py-2 rounded-full text-sm font-semibold
                              bg-emerald-100 text-emerald-700
                              hover:bg-emerald-200 transition flex items-center gap-2">
                                    <i class="fa fa-eye"></i>
                                </a>
                            @endif
                        </div>
                    </div>

                    {{-- Akta --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                        <label class="font-medium text-gray-700"><i class="fa fa-baby"></i> Scan Akta Kelahiran</label>
                        <div class="flex items-center gap-3">
                            <input type="file" name="akta" @if (empty($dokumen->akte)) required @endif
                                accept=".pdf,.jpg,.jpeg"
                                class="block w-full text-sm text-gray-500
                           file:mr-4 file:py-2 file:px-4
                           file:rounded-full file:border-0
                           file:text-sm file:font-semibold
                           file:bg-emerald-100 file:text-emerald-700
                           hover:file:bg-emerald-200 transition">
                            @if (!empty($dokumen->akte))
                                <a href="{{ asset('storage/' . $dokumen->akte) }}" target="_blank"
                                    class="px-4 py-2 rounded-full text-sm font-semibold
                              bg-emerald-100 text-emerald-700
                              hover:bg-emerald-200 transition flex items-center gap-2">
                                    <i class="fa fa-eye"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </fieldset>
            {{-- @dump($dokumen) --}}
            {{-- Dokumen Pendukung --}}
            <fieldset class="border border-gray-300 p-5 rounded-lg">
                <legend class="text-lg font-semibold text-gray-700 px-2">Dokumen Pendukung (Opsional)</legend>
                <p class="text-sm text-gray-500 mb-4">Unggah jika memiliki salah satu dokumen ini (KIP, PKH, SKTM).</p>
                <div class="space-y-4 mt-4">

                    {{-- KIP --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                        <label class="font-medium text-gray-700"><i class="fa fa-credit-card"></i> KIP</label>
                        <div class="flex items-center gap-3">
                            <input type="file" name="kip" accept=".pdf,.jpg,.jpeg"
                                class="block w-full text-sm text-gray-500
                           file:mr-4 file:py-2 file:px-4
                           file:rounded-full file:border-0
                           file:text-sm file:font-semibold
                           file:bg-emerald-100 file:text-emerald-700
                           hover:file:bg-emerald-200 transition">
                            @if (!empty($dokumen->KIP))
                                <a href="{{ asset('storage/' . $dokumen->KIP) }}" target="_blank"
                                    class="px-4 py-2 rounded-full text-sm font-semibold
                              bg-emerald-100 text-emerald-700
                              hover:bg-emerald-200 transition flex items-center gap-2">
                                    <i class="fa fa-eye"></i>
                                </a>
                            @endif
                        </div>
                    </div>

                    {{-- PKH --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                        <label class="font-medium text-gray-700"><i class="fa fa-hand-holding-heart"></i> PKH</label>
                        <div class="flex items-center gap-3">
                            <input type="file" name="pkh" accept=".pdf,.jpg,.jpeg"
                                class="block w-full text-sm text-gray-500
                           file:mr-4 file:py-2 file:px-4
                           file:rounded-full file:border-0
                           file:text-sm file:font-semibold
                           file:bg-emerald-100 file:text-emerald-700
                           hover:file:bg-emerald-200 transition">
                            @if (!empty($dokumen->PKH))
                                <a href="{{ asset('storage/' . $dokumen->PKH) }}" target="_blank"
                                    class="px-4 py-2 rounded-full text-sm font-semibold
                              bg-emerald-100 text-emerald-700
                              hover:bg-emerald-200 transition flex items-center gap-2">
                                    <i class="fa fa-eye"></i>
                                </a>
                            @endif
                        </div>
                    </div>

                    {{-- SKTM --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                        <label class="font-medium text-gray-700"><i class="fa fa-file-alt"></i> SKTM</label>
                        <div class="flex items-center gap-3">
                            <input type="file" name="sktm" accept=".pdf,.jpg,.jpeg"
                                class="block w-full text-sm text-gray-500
                           file:mr-4 file:py-2 file:px-4
                           file:rounded-full file:border-0
                           file:text-sm file:font-semibold
                           file:bg-emerald-100 file:text-emerald-700
                           hover:file:bg-emerald-200 transition">
                            @if (!empty($dokumen->SKTM))
                                <a href="{{ asset('storage/' . $dokumen->SKTM) }}" target="_blank"
                                    class="px-4 py-2 rounded-full text-sm font-semibold
                              bg-emerald-100 text-emerald-700
                              hover:bg-emerald-200 transition flex items-center gap-2">
                                    <i class="fa fa-eye"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </fieldset>
            {{-- Tombol --}}
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
