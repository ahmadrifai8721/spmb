@extends('portal-pendaftran.main')

@section('tempalte')
    <div class="bg-white rounded-xl shadow-2xl p-8 md:p-12">
        <form method="POST" action="{{ route('logout') }}" class="w-full">
            <div class="flex justify-between items-center mb-8 border-b pb-4">
                <h2 class="text-3xl font-bold text-emerald-700">Daftar Ulang Calon Siswa</h2>
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

        <div class="mb-10 max-w-4xl mx-auto">
            <div class="flex justify-between items-center text-center">
                <div
                    class="w-10 h-10 rounded-full flex items-center justify-center bg-emerald-600 ring-4 ring-white shadow-lg text-white font-semibold">
                    1</div>
                <div class="flex-1 h-1 bg-emerald-200 mx-2"></div>
                <div id="step-bio"
                    class="w-10 h-10 rounded-full flex items-center justify-center @if ($bio) bg-emerald-600  text-white @else bg-yellow-300 @endif font-semibold">
                    2</div>
                <div id="line-bio"
                    class="flex-1 h-1 @if ($bio) bg-emerald-200 @else bg-yellow-300 @endif mx-2">
                </div>
                <div id="step-upload"
                    class="w-10 h-10 rounded-full flex items-center justify-center @if ($bio && $berkas) bg-emerald-600  text-white @elseif($bio) bg-yellow-300  @else bg-gray-300 text-black @endif  font-semibold">
                    3</div>
                <div id="line-upload"
                    class="flex-1 h-1 @if ($bio && $berkas) bg-emerald-200   @elseif($bio) bg-yellow-200 @else bg-gray-300 @endif mx-2">
                </div>
                <div id="step-verifikasi"
                    class="w-10 h-10 rounded-full flex items-center justify-center  @if ($bio) bg-yellow-300  @elseif($berkas) bg-emerald-600 text-white @else bg-gray-300 text-black @endif font-semibold">
                    4</div>
            </div>
            <div class="flex justify-between mt-2 text-xs md:text-sm font-medium text-gray-600">
                <p class="text-emerald-600 text-center w-12">Daftar Awal</p>
                <p class="text-center w-28">Isi Biodata Lengkap</p>
                <p class="text-center w-28">Upload Dokumen</p>
                <p class="text-end text-center w-12">Verifikasi & Lulus</p>
            </div>
        </div>

        <div id="dashboard-content">
            <div id="content-biodata" class="p-6 border border-emerald-100 bg-emerald-50 rounded-lg mb-8">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <span class="text-2xl mr-2 text-emerald-800"><i class="fa fa-user-graduate"></i></span> Status Biodata
                    (Tahap 3)
                </h3>
                <p id="status-biodata"
                    class="text-lg font-semibold @if (!$bio) text-yellow-500 @else text-emerald-600 @endif">
                    Status: @if (!$bio)
                        Belum Diisi Lengkap
                    @else
                        Lengkap
                    @endif
                </p>
                <p class="text-sm text-gray-600 mt-2">Lengkapi biodata agar diakui sebagai <strong>Calon Siswa Baru<strong>.
                </p>
                <a href="{{ route('du.create') }}">
                    <button
                        class=" mt-4 px-6 py-2 bg-emerald-600 text-white font-medium rounded-lg hover:bg-emerald-700 transition">
                        @if ($bio)
                            Perbaharui Biodata
                        @else
                            Lengkapi Biodata Sekarang
                        @endif
                    </button>
                </a>
            </div>
            <div id="content-dokumen"
                class="p-6 border
            @if (!$bio) opacity-50 pointer-events-none  border-gray-100 bg-white rounded-lg @else border-emerald-100 bg-emerald-50 rounded-lg mb-8 @endif
            ">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <span
                        class="text-2xl mr-2 @if (!$bio) text-gray-500 @else text-emerald-800 @endif"><i
                            class="fa fa-folder"></i></span> Dokumen Daftar Ulang
                    (Tahap 4)
                </h3>
                <p id="status-dokumen"
                    class="text-lg font-semibold @if (!$bio) text-gray-500 @elseif (!$berkas) text-red-500 @else text-emerald-600 @endif">
                    Status: @if (!$bio)
                        Menunggu Biodata Lengkap
                    @elseif (!$berkas)
                        Dokumen Belum Lengkap
                    @else
                        Dokumen Lengkap
                    @endif
                </p>
                <p class="text-sm text-gray-600 mt-2">Daftar ulang baru bisa dilakukan setelah biodata lengkap.</p>
                <a href="{{ route('ub.index') }}">
                    <button
                        @if (!$bio) class="mt-4 px-6 py-2 bg-gray-400 text-white font-medium rounded-lg transition" disabled @else class=" mt-4 px-6 py-2 bg-emerald-600 text-white font-medium rounded-lg hover:bg-emerald-700 transition" @endif>

                        Upload Dokumen
                    </button>
                </a>
            </div>

        </div>
    </div>
    </div>
@endsection
