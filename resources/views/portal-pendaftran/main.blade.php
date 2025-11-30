<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal SPMB SMK Islam 1 Durenan</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/e11c24878e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/erimicel/select2-tailwindcss-v4-theme/dist/select2-tailwindcss-theme-plain.min.css">


    @livewireStyles

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }

        /* Styling kustom untuk progress step */
        .progress-step {
            transition: all 0.3s ease-in-out;
            @apply w-12 h-12 rounded-full flex items-center justify-center font-bold shadow-md;
        }

        .progress-step.active {
            @apply bg-emerald-600 ring-4 ring-white text-white;
        }
    </style>

</head>

<body class="antialiased">

    <div class="max-w-6xl mx-auto p-4 md:p-8">
        <header class="py-6 mb-8 border-b border-emerald-200">
            <h1 class="text-3xl font-extrabold text-emerald-700">SPMB SMK Islam 1 Durenan</h1>
            <p class="text-gray-500">Pendaftaran Peserta Didik Baru (PPDB)</p>
        </header>

        <div id="app-container">
            @yield('tempalte')
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.15.2/dist/cdn.min.js"></script>

    @livewireScripts
    <script>
        $(document).ready(function() {
            $('#reg_jurusan2').select2({
                placeholder: "-- Pilih Jurusan --",
                width: '100%',
                theme: 'tailwindcss-4',
            });
            $('#reg_jurusan1').select2({
                placeholder: "-- Pilih Jurusan (Wajib) --",
                width: '100%',
                theme: 'tailwindcss-4',
            });

            $('#reg_informan_select').select2({
                placeholder: "-- Pilih Informan --",
                width: '100%',
                theme: 'tailwindcss-4',
            }).on('change', function() {
                var data = $(this).val();
                if (data == "guru") {
                    $('#reg_informan_div').removeClass('hidden');
                    $('#reg_informan_text').addClass('hidden');
                    $('#reg_informan').next('.select2-container').show();
                } else {
                    $('#reg_informan_div').removeClass('hidden');
                    $('#reg_informan').next('.select2-container').hide();
                    $('#reg_informan_text').removeClass('hidden');
                }
            });

            $('#reg_informan').select2({
                placeholder: "-- Pilih Guru --",
                width: '100%',
                theme: 'tailwindcss-4',
            });
            $('#reg_informan').next('.select2-container').hide();
            $('#agama').select2({
                placeholder: "-- Pilih Agama --",
                width: '100%',
                theme: 'tailwindcss-4',
            });
            $('#jenisKelamin').select2({
                placeholder: "-- Pilih Jenis Kelamin --",
                width: '100%',
                theme: 'tailwindcss-4',
            });
            $('#status_dalam_keluarga').select2({
                placeholder: "-- Pilih Status Dalam Keluarga --",
                width: '100%',
                theme: 'tailwindcss-4',
            });

        });
    </script>
    @stack('scripts')
</body>

</html>
