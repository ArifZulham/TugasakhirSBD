<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\StatusController;
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

Route :: get("/",[LoginController::class,'showLoginForm'])->name('login');

Route::get('riwayat', [ProdukController::class, 'join'])->name('join');

Route ::prefix("provinsi")->group(function(){
    Route::get('/', [ProvinsiController::class, 'index'])->name('provinsi.index');
    Route::get('add', [ProvinsiController::class, 'create'])->name('provinsi.create');
    Route::post('store', [ProvinsiController::class, 'store'])->name('provinsi.store');
    Route::get('edit/{id}', [ProvinsiController::class, 'edit'])->name('provinsi.edit');
    Route::post('update/{id}', [ProvinsiController::class, 'update'])->name('provinsi.update');
    Route::post('delete/{id}', [ProvinsiController::class, 'delete'])->name('provinsi.delete');
});

Route ::prefix("sekolah")->group(function(){
    Route::get('/', [SekolahController::class, 'index'])->name('sekolah.index');
    Route::get('add', [SekolahController::class, 'create'])->name('sekolah.create');
    Route::post('store', [SekolahController::class, 'store'])->name('sekolah.store');
    Route::get('edit/{id}', [SekolahController::class, 'edit'])->name('sekolah.edit');
    Route::post('update/{id}', [SekolahController::class, 'update'])->name('sekolah.update');
    Route::post('delete/{id}', [SekolahController::class, 'delete'])->name('sekolah.delete');
    Route::post('recycle/{id}', [SekolahController::class, 'recycle'])->name('sekolah.recycle');
    Route::get('restore/{id}', [SekolahController::class, 'restore'])->name('sekolah.restore');
    Route::get('trash', [SekolahController::class, 'trash'])->name('sekolah.trash');
    Route::post('softdelete/{id}', [SekolahController::class, 'softdelete'])->name('sekolah.softdelete');
    Route::post('restore/{id}', [SekolahController::class, 'restore'])->name('sekolah.restore');
});

Route ::prefix("status")->group(function(){
    Route::get('/', [StatusController::class, 'index'])->name('status.index');
    Route::get('add', [StatusController::class, 'create'])->name('status.create');
    Route::post('store', [StatusController::class, 'store'])->name('status.store');
    Route::get('edit/{id}', [StatusController::class, 'edit'])->name('status.edit');
    Route::post('update/{id}', [StatusController::class, 'update'])->name('status.update');
    Route::post('delete/{id}', [StatusController::class, 'delete'])->name('status.delete');
    Route::post('recycle/{id}', [StatusController::class, 'recycle'])->name('status.recycle');
    Route::get('restore/{id}', [StatusController::class, 'restore'])->name('status.restore');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
