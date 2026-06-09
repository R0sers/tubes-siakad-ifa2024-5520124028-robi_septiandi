<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KRSController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\AuthController;


Route::middleware(['guest'])->group(function(){
    Route::get('/',[AuthController::class, 'index'])->name('login');
    Route::post('/',[AuthController::class, 'login']);



// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/home', function () {
//     return view('home');
// });







    Route::middleware(['userAkses:admin'])->group(function(){
            Route::get('/mahasiswa', [MahasiswaController::class, 'index' ])->name('mahasiswa'); 
            Route::get('/form-mahasiswa', [MahasiswaController::class, 'create' ])->name('form-mahasiswa'); 
            Route::put('/mahasiswa/{npm}', [MahasiswaController::class, 'update' ])->name('mahasiswaupdate'); 
            Route::post('/mahasiswa', [MahasiswaController::class, 'store' ])->name('mahasiswastore'); 
            Route::get('/mahasiswa/{npm}/edit', [MahasiswaController::class, 'edit' ])->name('form-edit-mahasiswa'); 
            Route::delete('/mahasiswa/{npm}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
            Route::get('/show/{id}/detail-mahasiswa',[MahasiswaController::class, 'show'])->name('detail-mahasiswa');

            Route::get('/dosen', [DosenController::class, 'index' ])->name('dosen'); 
            Route::get('/form-dosen', [DosenController::class, 'create' ])->name('form-dosen'); 
            Route::put('/dosen/{nidn}', [DosenController::class, 'update' ])->name('dosenupdate'); 
            Route::post('/dosen', [DosenController::class, 'store' ])->name('dosenstore'); 
            Route::get('/dosen/{nidn}/edit', [DosenController::class, 'edit' ])->name('form-edit-dosen'); 
            Route::delete('/dosen/{nidn}', [DosenController::class, 'destroy'])->name('dosen.destroy');
            Route::get('/show/{id}/detail-dosen',[DosenController::class, 'show'])->name('detail-dosen');

            Route::get('/krs', [KRSController::class, 'index' ])->name('krs'); 
            Route::get('/form-krs', [KRSController::class, 'create' ])->name('form-krs'); 
            Route::put('/krs/{id}', [KRSController::class, 'update' ])->name('krsupdate'); 
            Route::post('/krs', [KRSController::class, 'store' ])->name('krsstore'); 
            Route::get('/krs/{id}/edit', [KRSController::class, 'edit' ])->name('form-edit-krs'); 
            Route::delete('/krs/{id}', [KRSController::class, 'destroy'])->name('krs.destroy');
            Route::get('/show/{id}/detail-krs',[KRSController::class, 'show'])->name('detail-krs');

            Route::get('/matkul', [MataKuliahController::class, 'index' ])->name('matkul'); 
            Route::get('/form-matkul', [MataKuliahController::class, 'create' ])->name('form-matkul'); 
            Route::put('/matkul/{id}', [MataKuliahController::class, 'update' ])->name('matkulupdate'); 
            Route::post('/matkul', [MataKuliahController::class, 'store' ])->name('matkulstore'); 
            Route::get('/matkul/{id}/edit', [MataKuliahController::class, 'edit' ])->name('form-edit-matkul'); 
            Route::delete('/matkul/{id}', [MataKuliahController::class, 'destroy'])->name('matkul.destroy');
            Route::get('/show/{id}/detail-matkul',[MataKuliahController::class, 'show'])->name('detail-matkul');

            Route::get('/jadwal', [JadwalController::class, 'index' ])->name('jadwal'); 
            Route::get('/form-jadwal', [JadwalController::class, 'create' ])->name('form-jadwal'); 
            Route::put('/jadwal/{id}', [JadwalController::class, 'update' ])->name('jadwalupdate'); 
            Route::post('/jadwal', [JadwalController::class, 'store' ])->name('jadwalstore'); 
            Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit' ])->name('form-edit-jadwal'); 
            Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');
            Route::get('/show/{id}/detail-jadwal',[JadwalController::class, 'show'])->name('detail-jadwal');
    });
});