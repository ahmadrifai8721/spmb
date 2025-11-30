<?php

use App\Http\Controllers\auth as ControllersAuth;
use App\Http\Controllers\DaftarBerkasController;
use App\Http\Controllers\DaftarCalonSiswaController;
use App\Http\Controllers\SPMB;
use App\Models\timeLine;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;


//


Route::get('/', function () {
    return view('welcome', [
        'jadwal' => timeLine::all()
    ]);
})->name('home');

Route::get('/LoginSiswa/', [ControllersAuth::class, 'index'])->name('spmb.login')->middleware('signed');
// Route::view('mail', 'portal-pendaftran.bukti-daftar');


Route::resource('Portal-SPMB', SPMB::class)->names('spmb');
Route::group(
    ['middleware' => ['role:calon-siswa']],
    function () {
        Route::resource('daftar-ulang', DaftarCalonSiswaController::class)->names('du');
        Route::resource('upload-berkas', DaftarBerkasController::class)->names('ub');
        Route::get('Portal-SPMB-Selsai', function () {
            $getDataSiswa = auth()->user()->daftarCalonSiswa;

            if ($getDataSiswa->status && $getDataSiswa->berkas->status) {
                return view('portal-pendaftran.selesai', [
                    'siswa' => auth()->user()->daftarCalonSiswa,
                ]);
            }
            return redirect()->route('du.index')->with('info', 'Data Sudah Lengkap Silahkan Mengugu validasi data.');
        })->name('finis');
        Route::view('bukti-daftar', 'portal-pendaftran.bukti-daftar')->name('bukti-daftar');
    }
);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'role:admin'])
    ->name('dashboard');
Route::get('dashboard', function () {
    return redirect()->route('du.index');
})
    ->middleware(['auth', 'verified', 'role:calon-siswa'])
    ->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
