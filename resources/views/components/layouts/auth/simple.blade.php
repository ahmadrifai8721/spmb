<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-emerald-50 antialiased dark:bg-gradient-to-b dark:from-emerald-950 dark:to-emerald-900">
    <div class="flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
        <div class="flex w-full max-w-sm flex-col gap-2 bg-white/90 dark:bg-emerald-900/80 rounded-lg p-6 shadow-lg">
            <a href="{{ route('home') }}"
                class="flex flex-col items-center gap-2 font-medium text-emerald-700 dark:text-emerald-200"
                wire:navigate>
                <span class="flex h-9 w-9 mb-1 items-center justify-center rounded-md">
                    <x-app-logo-icon class="size-9 fill-current text-emerald-600 dark:text-emerald-300" />
                </span>
                <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
            </a>
            <div class="flex flex-col gap-6">
                {{ $slot }}
            </div>
        </div>
    </div>
    @fluxScripts
</body>

</html>
