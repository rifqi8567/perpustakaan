<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\listController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthenticatedSessionController as ControllersAuthenticatedSessionController;
use App\Http\Controllers\CreatebukuController;
use App\Http\Controllers\LombaController;
use App\Models\createbuku;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// menu utama->layar buku
Route::get('/home/list', [App\Http\Controllers\BukuController::class, 'index'])->name('list');

// layar buku ->daftar
Route::get('/home/book', [App\Http\Controllers\listController::class, 'index'])->name('book');


// toko ->data barang
Route::get('/home/listpenjualan', [App\Http\Controllers\listpenjualanController::class, 'index'])->name('listpenjualan');
Route::get('/home/data', [App\Http\Controllers\BukuController::class, 'view'])->name('data.buku');

// menu utama >> data buku
Route::get('/home/form', [App\Http\Controllers\PenjualanController::class, 'view'])->name('form.buku');

// Create
Route::post('/home/list/store', [App\Http\Controllers\listController::class, 'store'])->name('list.store');
Route::post('/home/form/store', [App\Http\Controllers\BukuController::class, 'store'])->name('create.store');


//detail buku
Route::get('/book/detail/{id}', [BukuController::class, 'detail'])->name('detail.buku');





//loug out
Route::post('/logout', [ControllersAuthenticatedSessionController::class, 'destroy'])
->name('logout');


// middleware User

Route::middleware(['admin'])->group(function () {
    // DELETE
    Route::delete('/databuku/{id}', [BukuController::class, 'destroy'])->name('create.destroy');
    Route::delete('/book/{id}', [listController::class, 'destroy'])->name('destroy.book');

    // untuk    Edit Buku
    Route::get('/book/edit/{id}', [BukuController::class, 'edit'])->name('edit.buku');
    Route::put('/book/edit/{id}', [BukuController::class, 'update'])->name('update.buku');
    
    // ini untuk Edit pendaftaran
    Route::put('/book/{id}', [listController::class, 'update'])->name('update.book');
    Route::get('/book/{id}/edit', [listController::class, 'edit'])->name('edit.book');

   //edit lomba
   Route::get('/book/lomba/edit/{id}', [LombaController::class, 'edit'])->name('edit.lomba');
   Route::get('/book/lomba', [LombaController::class, 'index'])->name('view.lomba');
   Route::put('/book/lomba/update/{id}', [LombaController::class, 'update'])->name('update.lomba');


});


