{{-- File: resources/views/portal-pendaftran/mailSend.blade.php --}}
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Pendaftaran Berhasil - {{ $appName ?? config('app.name') }}</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #ecfdf5;
        }

        .container {
            width: 100%;
            max-width: 448px;
            margin: 0 auto;
        }
    </style>
</head>

<body style="margin: 0; padding: 20px; font-family: Arial, sans-serif; background-color: #ecfdf5;">
    <div class="container"
        style="width: 100%; max-width: 448px; margin: 0 auto; background-color: #ffffff; border-radius: 12px; box-shadow: 0 10px 15px rgba(0,0,0,0.1); overflow: hidden;">

        <!-- Content -->
        <div style="padding: 32px;">
            <div style="text-align: center;">
                <!-- Icon -->
                <div
                    style="background-color: #d1fae5; border-radius: 9999px; width: 60px; height: 60px; margin: 0 auto 16px; display: flex; align-items: center; justify-content: center;">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#059669"
                        stroke-width="2">
                        <path d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>

                <!-- Title -->
                <h1 style="font-size: 24px; font-weight: bold; color: #047857; margin: 0 0 8px 0;">Pendaftaran Berhasil
                </h1>

                <!-- Description -->
                <p style="color: #374151; text-align: center; margin: 0 0 24px 0; line-height: 1.5;">
                    Halo {{ $nama ?? 'Calon Peserta' }}, pendaftaran Anda berhasil diterima. Silakan masuk untuk
                    melanjutkan pengisian data.
                </p>

                <!-- Email Box -->
                <div
                    style="width: 100%; background-color: #ecfdf5; border-radius: 8px; padding: 16px; margin-bottom: 16px; box-sizing: border-box;">
                    <p style="color: #4b5563; font-size: 14px; margin: 0 0 4px 0;">Email:</p>
                    <p style="font-weight: 600; color: #111827; margin: 0;">{{ $dataSiswa->email_aktif ?? '-' }}</p>
                </div>

                <!-- Password Box -->
                <div
                    style="width: 100%; background-color: #ecfdf5; border-radius: 8px; padding: 16px; margin-bottom: 16px; box-sizing: border-box;">
                    <p style="color: #4b5563; font-size: 14px; margin: 0 0 4px 0;">Password:</p>
                    <p style="font-weight: 600; color: #111827; margin: 0;">{{ $dataSiswa->nisn ?? '-' }}</p>
                </div>

                <!-- Note (if present) -->
                @if (!empty($note))
                    <div
                        style="width: 100%; background-color: #ecfdf5; border-radius: 8px; padding: 16px; margin-bottom: 16px; box-sizing: border-box;">
                        <p style="color: #374151; font-size: 14px; margin: 0 0 8px 0;">Note</p>
                        <p style="font-weight: 600; color: #111827; margin: 0;">{{ $note }}</p>
                    </div>
                @endif

                <!-- Login Button -->
                <a href="{{ $loginUrl ?? url('/login') }}"
                    style="display: inline-block; padding: 8px 24px; background-color: #059669; color: #ffffff; border-radius: 8px; font-weight: 600; text-decoration: none; margin-bottom: 24px; border: none; cursor: pointer;">
                    Masuk / Login
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div
            style="background-color: #d1fae5; padding: 16px 24px; text-align: center; font-size: 14px; color: #065f46;">
            <p style="margin: 0 0 8px 0;">{{ $appName ?? config('app.name') }}</p>
            <p style="margin: 0;">Butuh bantuan? <a href="mailto:{{ $supportEmail ?? 'support@contoh.com' }}"
                    style="color: #047857; text-decoration: underline;">{{ $supportEmail ?? 'support@contoh.com' }}</a>
            </p>
        </div>
    </div>
</body>

</html>
