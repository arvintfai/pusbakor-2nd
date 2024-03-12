<?php

use App\Http\Controllers\API\DesaController;
use App\Http\Controllers\API\JenisPerusahaanController;
use App\Http\Controllers\API\KBLIController;
use App\Http\Controllers\API\KecamatanController;
use App\Http\Controllers\API\ModalController;
use App\Http\Controllers\API\PerusahaanController;
use App\Http\Controllers\API\ProyekController;
use App\Http\Controllers\API\ResikoController;
use App\Http\Controllers\API\SkalaUsahaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('proyek', ProyekController::class);
Route::resource('perusahaan', PerusahaanController::class);
Route::resource('modal', ModalController::class);
Route::resource('resiko', ResikoController::class);
Route::resource('skalausaha', SkalaUsahaController::class);
Route::resource('desa', DesaController::class);
Route::resource('kecamatan', KecamatanController::class);
Route::resource('kbli', KBLIController::class);
Route::resource('jenisperusahaan', JenisPerusahaanController::class);
Route::get('perusahaan/select/all', [PerusahaanController::class, 'select'])->name('selectperusahaan');
Route::get('data/dashboard', [ProyekController::class, 'dashboard']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
