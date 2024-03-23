<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index'])->name('/kategori');
Route::get('/user', [UserController::class, 'index'])->name('/user');

// Jobsheet 4 - Praktikum 2.6

Route::get('/user/tambah', [UserController::class, 'tambah'])->name('/user/tambah');
Route::get('user/ubah/{id}', [UserController::class, 'ubah'])->name('/user/ubah');
Route::get('user/hapus/{id}', [UserController::class, 'hapus'])->name('/user/hapus');
Route::post('/user', [UserController::class, 'tambah_simpan']);
Route::put('user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan'])->name('/user/ubah_simpan');

// Jobsheet 5 - Praktikum 3  

Route::get('/kategori/create', [KategoriController::class, 'create'])->name('/kategori/create');
Route::post('/kategori', [KategoriController::class, 'store']);

// Jobsheet 5 Tugas 
Route::get('kategori/edit/{id}', [KategoriController::class, 'edit'])->name('/kategori/edit');
Route::put('kategori/edit_save/{id}', [KategoriController::class, 'edit_save'])->name('/kategori/edit_save');
Route::get('kategori/delete/{id}', [KategoriController::class, 'hapus'])->name('/kategori/hapus');


Route::get('/level/tambah', [LevelController::class, 'tambah'])->name('/level/tambah');
Route::post('/level', [LevelController::class, 'store']);

