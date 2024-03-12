<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminController,
    DashboardController,
    DesaController,
    JenisPerusahaanController,
    KBLIController,
    KecamatanController,
    PerusahaanController,
    ProyekController,
    ResikoController,
    SkalaUsahaController,
    StatusModalController,
    UsersController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    Route::get('/admin/perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan');
    Route::get('/admin/perusahaan/{id}/edit', [PerusahaanController::class, 'edit'])->name('perusahaan.edit');
    Route::get('/admin/perusahaan/{id}', [PerusahaanController::class, 'destroy'])->name('perusahaan.delete');
    Route::post('/admin/perusahaan/{id}', [PerusahaanController::class, 'update'])->name('perusahaan.update');
    Route::get('/perusahaan/create', [PerusahaanController::class, 'create'])->name('perusahaan.create');
    Route::post('/perusahaan/store', [PerusahaanController::class, 'store'])->name('perusahaan.store');
    
    Route::get('/admin/skalausaha', [SkalaUsahaController::class, 'index'])->name('skalausaha');
    Route::get('/admin/skalausaha/{id}/edit', [SkalaUsahaController::class, 'edit'])->name('skalausaha.edit');
    Route::get('/admin/skalausaha/{id}', [SkalaUsahaController::class, 'destroy'])->name('skalausaha.delete');
    Route::post('/admin/skalausaha/{id}', [SkalaUsahaController::class, 'update'])->name('skalausaha.update');
    Route::get('/skalausaha/create', [SkalaUsahaController::class, 'create'])->name('skalausaha.create');
    Route::post('/skalausaha/store', [SkalaUsahaController::class, 'store'])->name('skalausaha.store');
    
    Route::get('/admin/proyek', [ProyekController::class, 'index'])->name('proyek');
    Route::get('/admin/proyek/{id}/edit', [ProyekController::class, 'edit'])->name('proyek.edit');
    Route::get('/admin/proyek/{id}', [ProyekController::class, 'destroy'])->name('proyek.delete');
    Route::post('/admin/proyek/{id}', [ProyekController::class, 'update'])->name('proyek.update');
    Route::get('/proyek/create', [ProyekController::class, 'create'])->name('proyek.create');
    Route::post('/proyek/store', [ProyekController::class, 'store'])->name('proyek.store');
    
    Route::get('/admin/desa', [DesaController::class, 'index'])->name('desa');
    Route::get('/admin/desa/{id}/edit', [DesaController::class, 'edit'])->name('desa.edit');
    Route::get('/admin/desa/{id}', [DesaController::class, 'destroy'])->name('desa.delete');
    Route::post('/admin/desa/{id}', [DesaController::class, 'update'])->name('desa.update');
    Route::get('/desa/create', [DesaController::class, 'create'])->name('desa.create');
    Route::post('/desa/store', [DesaController::class, 'store'])->name('desa.store');
    
    Route::get('/admin/jenisperusahaan', [JenisPerusahaanController::class, 'index'])->name('jenisperusahaan');
    Route::get('/admin/jenisperusahaan/{id}/edit', [JenisPerusahaanController::class, 'edit'])->name('jenisperusahaan.edit');
    Route::get('/admin/jenisperusahaan/{id}', [JenisPerusahaanController::class, 'destroy'])->name('jenisperusahaan.delete');
    Route::post('/admin/jenisperusahaan/{id}', [JenisPerusahaanController::class, 'update'])->name('jenisperusahaan.update');
    Route::get('/jenisperusahaan/create', [JenisPerusahaanController::class, 'create'])->name('jenisperusahaan.create');
    Route::post('/jenisperusahaan/store', [JenisPerusahaanController::class, 'store'])->name('jenisperusahaan.store');
    
    Route::get('/admin/statusmodal', [StatusModalController::class, 'index'])->name('statusmodal');
    Route::get('/admin/statusmodal/{id}/edit', [StatusModalController::class, 'edit'])->name('statusmodal.edit');
    Route::get('/admin/statusmodal/{id}', [StatusModalController::class, 'destroy'])->name('statusmodal.delete');
    Route::post('/admin/statusmodal/{id}', [StatusModalController::class, 'update'])->name('statusmodal.update');
    Route::get('/statusmodal/create', [StatusModalController::class, 'create'])->name('statusmodal.create');
    Route::post('/statusmoda/store', [StatusModalController::class, 'store'])->name('statusmodal.store');
    
    Route::get('/admin/resiko', [ResikoController::class, 'index'])->name('resiko');
    Route::get('/admin/resiko/{id}/edit', [ResikoController::class, 'edit'])->name('resiko.edit');
    Route::get('/admin/resiko/{id}', [ResikoController::class, 'destroy'])->name('resiko.delete');
    Route::post('/admin/resiko/{id}', [ResikoController::class, 'update'])->name('resiko.update');
    Route::get('/resiko/create', [ResikoController::class, 'create'])->name('resiko.create');
    Route::post('/resiko/store', [ResikoController::class, 'store'])->name('resiko.store');
    
    Route::get('/admin/kbli', [KBLIController::class, 'index'])->name('kbli');
    Route::get('/admin/kbli/{id}/edit', [KBLIController::class, 'edit'])->name('kbli.edit');
    Route::get('/admin/kbli/{id}', [KBLIController::class, 'destroy'])->name('kbli.delete');
    Route::post('/admin/kbli/{id}', [KBLIController::class, 'update'])->name('kbli.update');
    Route::get('/kbli/create', [KBLIController::class, 'create'])->name('kbli.create');
    Route::post('/kbli/store', [KBLIController::class, 'store'])->name('kbli.store');
    Route::get('/kbli/show/{id}', [KBLIController::class, 'show'])->name('kbli.show');
    
    Route::get('/admin/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan');
    Route::get('/admin/kecamatan/{id}/edit', [KecamatanController::class, 'edit'])->name('kecamatan.edit');
    Route::get('/admin/kecamatan/{id}', [KecamatanController::class, 'destroy'])->name('kecamatan.delete');
    Route::post('/admin/kecamatan/{id}', [KecamatanController::class, 'update'])->name('kecamatan.update');
    Route::get('/kecamatan/create', [KecamatanController::class, 'create'])->name('kecamatan.create');
    Route::post('/kecamatan/store', [KecamatanController::class, 'store'])->name('kecamatan.store');
    
    Route::get('/admin/users', [UsersController::class, 'index'])->name('user');
    Route::get('/admin/users/{id}/edit', [UsersController::class, 'edit'])->name('user.edit');
    Route::get('/admin/users/{id}', [UsersController::class, 'destroy'])->name('user.delete');
    Route::post('/admin/users/{id}', [UsersController::class, 'update'])->name('user.update');
    Route::get('/users/create', [UsersController::class, 'create'])->name('user.create');
    Route::post('/users/store', [UsersController::class, 'store'])->name('user.store'); 
});