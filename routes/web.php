<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\UserController;
use App\Models\SuratMasuk;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(DashboardController::class)->middleware('auth')->group(function () {
	Route::get('/', 'index')->name('home');
});


Route::middleware('auth')->group(function(){
Route::controller(UserController::class)->middleware(['auth', 'only_admin'])->name('users.')->group(function () {
	Route::post('/users', 'store')->name('store');
	Route::get('/users/create', 'create')->name('create');
	Route::get('/users/{user}/edit', 'edit')->name('edit');
	Route::put('/users/{user}/update', 'update')->name('update');
	Route::delete('/users/{user}/delete', 'delete')->name('delete');
});

Route::controller(UserController::class)->middleware('auth')->name('users.')->group(function () {
	Route::get('/users', 'index')->name('index');
	});
	
Route::controller(PegawaiController::class)->middleware(['auth', 'only_admin'])->name('pegawai.')->group(function () {
	Route::get('/pegawai', 'index')->name('index');
	Route::post('/pegawai', 'store')->name('store');
	Route::get('/pegawai/create', 'create')->name('create');
	Route::get('/pegawai/{id}/edit', 'edit')->name('edit');
	Route::put('/pegawai/{id}/update', 'update')->name('update');
	Route::delete('/pegawai/{id}/delete', 'delete')->name('delete');
});

Route::controller(PegawaiController::class)->name('pegawai.')->group(function () {
	Route::get('/pegawai', 'index')->name('index');
	});

Route::controller(SuratMasukController::class)->name('suratmasuk.')->group(function () {
	Route::get('/suratmasuk', 'index')->name('index');
	Route::post('/suratmasuk', 'store')->name('store');
	Route::get('/suratmasuk/create', 'create')->name('create');
	Route::get('/suratmasuk/{surat}', 'show')->name('show');
	Route::get('/suratmasuk/{surat}/edit', 'edit')->name('edit');
	Route::put('/suratmasuk/{surat}/update', 'update')->name('update');
	Route::delete('/suratmasuk/{surat}/delete', 'delete')->name('delete');
});

Route::controller(SuratKeluarController::class)->name('suratkeluar.')->group(function () {
	Route::get('/suratkeluar', 'index')->name('index');
	Route::post('/suratkeluar', 'store')->name('store');
	Route::get('/suratkeluar/create', 'create')->name('create');
	Route::get('/suratkeluar/createsprint', 'createsprint')->name('createsprint');
	Route::get('/suratkeluar/{surat}/edit', 'edit')->name('edit');
	Route::put('/suratkeluar/{surat}/update', 'update')->name('update');
	Route::put('/suratkeluar/{surat}/verifikasi', 'verifikasi')->name('verifikasi');
	Route::delete('/suratkeluar/{surat}/delete', 'delete')->name('delete');
	Route::get('/suratkeluar/{surat}/print', 'printSurat')->name('print');
	Route::get('/suratkeluar/test', 'test')->name('test');
	Route::get('/suratkeluar/{surat}/printsprint', 'printSuratsprint')->name('printsprint');
});

Route::controller(DisposisiController::class)->name('disposisi.')->group(function () {
	Route::get('/suratmasuk/{id}/disposisi', 'index')->name('index');
	Route::post('/suratmasuk/{id}/disposisi', 'store')->name('store');
	Route::get('/kabid-edit/{id}/disposisi/{disposisi}', 'kabid')->name('kabid');
	Route::get('/suratmasuk/{id}/disposisi/create', 'create')->name('create');
	Route::get('/suratmasuk/{id}/disposisi/{disposisi}/edit', 'edit')->name('edit');
	Route::put('/suratmasuk/{id}/disposisi/{disposisi}/update', 'update')->name('update');
	Route::delete('/suratmasuk/{id}/disposisi/{disposisi}/delete', 'delete')->name('delete');
});
});

require 'auth.php';
