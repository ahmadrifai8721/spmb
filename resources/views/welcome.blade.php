<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMB SMK Islam 1 Durenan - Sistem Pendaftaran Murid Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        pastel: {
                            green: '#10b981',
                            /* Emerald 500 */
                            light: '#ecfdf5',
                            /* Emerald 50 */
                            dark: '#064e3b',
                            /* Emerald 900 */
                            accent: '#2dd4bf',
                            /* Teal 400 */
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        /* Pola latar belakang halus untuk Hero Section */
        .pattern-grid {
            background-image: radial-gradient(#ffffff 1px, transparent 1px);
            background-size: 20px 20px;
        }

        /* Efek Glassmorphism */
        .glass {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
    </style>
</head>

<body class="bg-slate-50 text-gray-800 antialiased selection:bg-emerald-200 selection:text-emerald-900">

    <header class="fixed w-full top-0 z-50 transition-all duration-300 glass shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                <div class="flex-shrink-0 flex items-center gap-3 cursor-pointer">

                    <img class=" w-10 h-10 rounded-xl flex items-center
                        justify-center text-white font-bold shadow-lg transform rotate-3 hover:rotate-0 transition
                        duration-300"
                        src="{{ url('/') }}/assets/img/SMK Islam 1 Durenan.png" alt="">
                    <div>
                        <h1 class="text-lg font-bold text-gray-900 leading-tight">SMK Islam 1</h1>
                        <p class="text-xs text-emerald-600 font-semibold tracking-wider">DURENAN</p>
                    </div>
                </div>

                <nav class="hidden md:flex space-x-8">
                    <a href="#home"
                        class="text-gray-600 hover:text-emerald-600 font-medium transition py-2">Beranda</a>
                    <a href="#info" class="text-gray-600 hover:text-emerald-600 font-medium transition py-2">Info
                        PPDB</a>
                    <a href="#jurusan"
                        class="text-gray-600 hover:text-emerald-600 font-medium transition py-2">Jurusan</a>
                    <a href="#kontak"
                        class="text-gray-600 hover:text-emerald-600 font-medium transition py-2">Kontak</a>
                </nav>

                <div class="hidden md:flex">
                    <a href="{{ route('spmb.index') }}"
                        class=" mx-2 px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-full shadow-lg shadow-emerald-200 transition transform hover:-translate-y-0.5">
                        Daftar Sekarang
                    </a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class=" mx-2 px-6 py-2.5 bg-emerald-800 hover:bg-emerald-900
                                text-white font-semibold rounded-full shadow-lg shadow-emerald-200 transition transform
                                hover:-translate-y-0.5">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class=" mx-2 px-6 py-2.5 bg-emerald-800 hover:bg-emerald-900 text-white font-semibold rounded-full shadow-lg shadow-emerald-200 transition transform hover:-translate-y-0.5">
                                Log in
                            </a>
                        @endauth
                    @endif
                </div>

                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-gray-600 hover:text-emerald-600 focus:outline-none">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 absolute w-full shadow-xl">
            <div class="px-4 pt-2 pb-6 space-y-2">
                <a href="#home"
                    class="block px-3 py-3 text-base font-medium text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-md">Beranda</a>
                <a href="#info"
                    class="block px-3 py-3 text-base font-medium text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-md">Info
                    PPDB</a>
                <a href="#jurusan"
                    class="block px-3 py-3 text-base font-medium text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-md">Jurusan</a>
                <a href="{{ route('spmb.index') }}"
                    class="block px-3 py-3 text-base font-bold text-white bg-emerald-500 rounded-md text-center mt-4">Daftar
                    Sekarang</a>
            </div>
        </div>
    </header>

    <section id="home"
        class="relative pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden bg-gradient-to-br from-emerald-50 via-white to-teal-50">
        <div
            class="absolute top-20 right-0 w-96 h-96 bg-teal-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob">
        </div>
        <div
            class="absolute top-20 left-0 w-96 h-96 bg-emerald-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000">
        </div>

        <!-- Green overlay -->
        <div aria-hidden="true" class="absolute inset-0 bg-emerald-600/10 mix-blend-multiply pointer-events-none"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
            <span
                class="inline-block py-1 px-3 rounded-full bg-emerald-100 text-emerald-700 text-sm font-bold mb-6 tracking-wide uppercase shadow-sm">
                Sistem Penerimanan Murid Baru 2025/2026
            </span>
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-gray-900 tracking-tight mb-6">
                Raih Masa Depan <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-teal-500">
                    Gemilang Bersama Kami
                </span>
            </h1>
            <p class="mt-4 text-xl text-gray-600 max-w-2xl mx-auto mb-10 leading-relaxed">
                Bergabunglah dengan SMK Islam 1 Durenan. Sekolah berbasis teknologi dan industri dengan fasilitas modern
                untuk mencetak generasi siap kerja.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('spmb.index') }}"
                    class="px-8 py-4 bg-emerald-600 hover:bg-emerald-700 text-white text-lg font-bold rounded-xl shadow-xl shadow-emerald-200 transition transform hover:-translate-y-1">
                    Mulai Pendaftaran
                </a>
                <a href="#jurusan"
                    class="px-8 py-4 bg-white hover:bg-gray-50 text-emerald-700 border border-emerald-200 text-lg font-bold rounded-xl shadow-md transition">
                    Lihat Jurusan
                </a>
            </div>

            <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-8 border-t border-gray-200 pt-10">
                <div>
                    <p class="text-3xl font-extrabold text-gray-900">6</p>
                    <p class="text-sm text-gray-500 font-medium">Jurusan Unggulan</p>
                </div>
                <div>
                    <p class="text-3xl font-extrabold text-gray-900">500+</p>
                    <p class="text-sm text-gray-500 font-medium">Siswa Aktif</p>
                </div>
                <div>
                    <p class="text-3xl font-extrabold text-gray-900">50+</p>
                    <p class="text-sm text-gray-500 font-medium">Mitra Industri</p>
                </div>
                <div>
                    <p class="text-3xl font-extrabold text-gray-900">A</p>
                    <p class="text-sm text-gray-500 font-medium">Akreditasi Sekolah</p>
                </div>
            </div>
        </div>
    </section>

    <section id="info" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Informasi Pendaftaran</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">Simak jadwal dan alur pendaftaran agar tidak tertinggal
                    informasi penting.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

                <div
                    class="bg-slate-50 rounded-3xl p-8 border border-slate-100 shadow-lg relative overflow-hidden group hover:border-emerald-200 transition duration-300">
                    <div
                        class="absolute top-0 right-0 -mt-10 -mr-10 w-32 h-32 bg-emerald-100 rounded-full opacity-50 group-hover:scale-110 transition">
                    </div>

                    <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                        <span class="bg-emerald-100 text-emerald-600 p-2 rounded-lg mr-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </span>
                        Jadwal Kegiatan
                    </h3>

                    <div class="space-y-6">
                        @forelse ($jadwal as $item)
                            <div class="w-full border-t border-gray-200"></div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-16 text-sm font-bold text-emerald-600">{{ $item->title }}
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold text-gray-900">{{ $item->description }}</h4>
                                    <p class="text-gray-500">{{ $item->date }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-16 text-sm font-bold text-emerald-600">Persiapan</div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold text-gray-900">Pendaftaran Belum Di Jadwalkan</h4>
                                    <p class="text-gray-500">-</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-8">Alur Pendaftaran Mudah</h3>
                    <div
                        class="space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-300 before:to-transparent">

                        <div
                            class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group">
                            <div
                                class="flex items-center justify-center w-10 h-10 rounded-full border border-white bg-emerald-500 shadow text-white shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10 font-bold">
                                1
                            </div>
                            <div
                                class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] bg-white p-4 rounded-xl shadow-md border border-gray-100">
                                <h4 class="font-bold text-gray-800">Buat Akun</h4>
                                <p class="text-sm text-gray-500">Isi data diri singkat untuk mendapatkan akses.</p>
                            </div>
                        </div>

                        <div
                            class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group">
                            <div
                                class="flex items-center justify-center w-10 h-10 rounded-full border border-white bg-emerald-500 shadow text-white shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10 font-bold">
                                2
                            </div>
                            <div
                                class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] bg-white p-4 rounded-xl shadow-md border border-gray-100">
                                <h4 class="font-bold text-gray-800">Lengkapi Formulir</h4>
                                <p class="text-sm text-gray-500">Pilih jurusan dan unggah dokumen persyaratan.</p>
                            </div>
                        </div>

                        <div
                            class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group">
                            <div
                                class="flex items-center justify-center w-10 h-10 rounded-full border border-white bg-emerald-500 shadow text-white shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10 font-bold">
                                3
                            </div>
                            <div
                                class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] bg-white p-4 rounded-xl shadow-md border border-gray-100">
                                <h4 class="font-bold text-gray-800">Daftar Ulang</h4>
                                <p class="text-sm text-gray-500">Jika lolos, lakukan daftar ulang di sekolah.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="jurusan" class="py-20 bg-emerald-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-emerald-600 font-bold tracking-wider uppercase text-sm">Program Keahlian</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-2">Pilih Minat & Bakatmu</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div
                    class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 group">
                    <div class="h-40 bg-gradient-to-r from-emerald-400 to-green-500 p-6 flex items-end">
                        <h3 class="text-2xl font-bold text-white">TKJ</h3>
                    </div>
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-2">Teknik Komputer & Jaringan</h4>
                        <p class="text-gray-600 text-sm mb-4">Ahli dalam infrastruktur jaringan, server, dan fiber
                            optik.</p>
                        <!-- <a href="#"
                            class="inline-flex items-center text-emerald-600 font-semibold text-sm hover:underline">
                            Lihat Kurikulum <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a> -->
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 group">
                    <div class="h-40 bg-gradient-to-r from-teal-400 to-cyan-500 p-6 flex items-end">
                        <h3 class="text-2xl font-bold text-white">PSPT</h3>
                    </div>
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-2">Program Siaran dan Produksi Televisi</h4>
                        <p class="text-gray-600 text-sm mb-4">Kreator konten digital, videografi, dan desain grafis.
                        </p>
                        <!-- <a href="#"
                            class="inline-flex items-center text-teal-600 font-semibold text-sm hover:underline">
                            Lihat Kurikulum <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a> -->
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 group">
                    <div class="h-40 bg-gradient-to-r from-violet-400 to-purple-500 p-6 flex items-end">
                        <h3 class="text-2xl font-bold text-white">Animasi</h3>
                    </div>
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-2">Seni Animasi 2D/3D</h4>
                        <p class="text-gray-600 text-sm mb-4">Desain karakter, modeling 3D, dan motion graphic.</p>
                        <!-- <a href="#"
                            class="inline-flex items-center text-purple-600 font-semibold text-sm hover:underline">
                            Lihat Kurikulum <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a> -->
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 group">
                    <div class="h-40 bg-gradient-to-r from-yellow-400 to-orange-400 p-6 flex items-end">
                        <h3 class="text-2xl font-bold text-white">OTKP</h3>
                    </div>
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-2">Otomatisasi Tata Kelola Perkantoran</h4>
                        <p class="text-gray-600 text-sm mb-4">Manajemen administrasi modern dan public speaking.</p>
                        <!-- <a href="#"
                            class="inline-flex items-center text-orange-600 font-semibold text-sm hover:underline">
                            Lihat Kurikulum <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a> -->
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 group">
                    <div class="h-40 bg-gradient-to-r from-blue-400 to-indigo-500 p-6 flex items-end">
                        <h3 class="text-2xl font-bold text-white">AKL</h3>
                    </div>
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-2">Akuntansi Keuangan Lembaga</h4>
                        <p class="text-gray-600 text-sm mb-4">Pengelolaan keuangan, pajak, dan software akuntansi.</p>
                        <!-- <a href="#"
                            class="inline-flex items-center text-blue-600 font-semibold text-sm hover:underline">
                            Lihat Kurikulum <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a> -->
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 group">
                    <div class="h-40 bg-gradient-to-r from-pink-400 to-rose-500 p-6 flex items-end">
                        <h3 class="text-2xl font-bold text-white">BR</h3>
                    </div>
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-2">Bisnis Retail</h4>
                        <p class="text-gray-600 text-sm mb-4">Digital marketing, e-commerce, dan kewirausahaan.</p>
                        <!-- <a href="#"
                            class="inline-flex items-center text-rose-600 font-semibold text-sm hover:underline">
                            Lihat Kurikulum <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a> -->
                    </div>
                </div>

            </div>
        </div>
    </section>



    <section id="kontak" class="bg-gray-50 pt-16 pb-10 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Hubungi Kami</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="text-emerald-600 mt-1">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="font-semibold text-gray-800">Alamat Sekolah</p>
                                <p class="text-gray-600">Jl. Raya Durenan , Durenan, Kab. Trenggalek, Jawa Timur
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="text-emerald-600 mt-1">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-3.28a1 1 0 01-.948-.684l-1.498-4.493a1 1 0 01.502-1.21l2.257-1.13a11.042 11.042 0 00-5.516-5.516l-1.13 2.257a1 1 0 01-1.21.502l-4.493-1.498A1 1 0 015 5.28V5z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="font-semibold text-gray-800">Hotline PPDB</p>
                                <p class="text-gray-600"><a href="http://" rel="noopener noreferrer">0812-3456-7890
                                        (WhatsApp)</a></p>
                                <p class="text-gray-600"><a href="http://" rel="noopener noreferrer">0812-3456-7890
                                        (WhatsApp)</a></p>
                                <p class="text-gray-600"><a href="http://" rel="noopener noreferrer">0812-3456-7890
                                        (WhatsApp)</a></p>
                                <p class="text-gray-600"><a href="http://" rel="noopener noreferrer">0812-3456-7890
                                        (WhatsApp)</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-64 bg-gray-200 rounded-xl overflow-hidden shadow-inner relative">
                    <div class="absolute inset-0 flex  justify-center text-gray-500 font-medium">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1020.0920195311493!2d111.79395554507649!3d-8.12099044858645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e791c3b28c7bb49%3A0x9868a8d446baef1f!2sSMK%20Islam%201%20Durenan!5e1!3m2!1sid!2sid!4v1764240492221!5m2!1sid!2sid"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

            <hr class="border-gray-300 mb-8">

            <footer class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
                <div class="mb-4 md:mb-0">
                    &copy; 2025 SMK Islam 1 Durenan. All rights reserved.
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="hover:text-emerald-600 transition">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-emerald-600 transition">Syarat & Ketentuan</a>
                </div>
            </footer>
        </div>
    </section>

    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        // Close menu when clicking a link
        menu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                menu.classList.add('hidden');
            });
        });
    </script>
</body>

</html>
