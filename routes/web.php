<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $breadcrumb = (object) [
        'title' => 'Selamat Datang',
        'list'  => ['Home', 'Welcome']
    ];

    $activeMenu = 'dashboard';

    return view('dashboard', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
});


Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']);          // menampilkan halaman awal kategori barang
    Route::post('/list', [KategoriController::class, 'list']);      // menampilkan data kategori barang dalam bentuk json untuk datatables
    Route::get('/create', [KategoriController::class, 'create']);   // menampilkan halaman form tambah kategori barang
    Route::post('/', [KategoriController::class, 'store']);         // menyimpan data kategori barang baru
    Route::get('/{id}', [KategoriController::class, 'show']);       // menampilkan detail kategori barang
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);  // menampilkan halaman form edit kategori barang
    Route::put('/{id}', [KategoriController::class, 'update']);     // menyimpan perubahan data kategori barang
    Route::delete('/{id}', [KategoriController::class, 'destroy']); // menghapus data kategori barang
});

Route::group(['prefix' => 'arsip'], function () {
    Route::get('/', [ArsipController::class, 'index']);          // menampilkan halaman awal kategori barang
    Route::post('/list', [ArsipController::class, 'list']);      // menampilkan data kategori barang dalam bentuk json untuk datatables
    Route::get('/create', [ArsipController::class, 'create']);   // menampilkan halaman form tambah kategori barang
    Route::post('/', [ArsipController::class, 'store']);         // menyimpan data kategori barang baru
    Route::get('/{id}', [ArsipController::class, 'show']);       // menampilkan detail kategori barang
    Route::get('/{id}/edit', [ArsipController::class, 'edit']);  // menampilkan halaman form edit kategori barang
    Route::put('/{id}', [ArsipController::class, 'update']);     // menyimpan perubahan data kategori barang
    Route::delete('/{id}', [ArsipController::class, 'destroy']); // menghapus data kategori barang
});

Route::get('/about', [AboutController::class, 'index']);           // menampilkan halaman about
