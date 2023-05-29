<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

//mengambil semua data $search
Route::get('/', [StudentsController::class, 'index'])->name('home');

//halaman tambah data
Route::get('/add', [StudentsController::class, 'create'])->name('add');

//tambah data
Route::post('/add/send', [StudentsController::class, 'store'])->name('send');

// menampilkan halaman edit dan mengirim satu datanya
Route::get('/edit/{id}', [StudentsController::class, 'edit'])->name('edit');

//mengubah data
Route::patch('/update/{id}', [StudentsController::class, 'update'])->name('update');

// hapus data pake softdeletes
Route::delete('/delete/{id}', [StudentsController::class, 'destroy'])->name('delete');

//ambil data sampah
Route::get('/trash', [StudentsController::class, 'trash'])->name('trash');

//restore
Route::get('/trash/restore/{id}', [StudentsController::class, 'restore'])->name('restore');

//hapus permanen
Route::get('/trash/delete/permanent/{id}', [StudentsController::class, 'permanent'])->name('permanent');



