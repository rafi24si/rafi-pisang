<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pcr', function () {
    return 'BELAJAR LARAVEL';
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
})->name('mahasiswa.show');

Route::get('/nama/{param1?}', function ($param1 = '' ) {
    return 'Nama saya: '.$param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM saya: '.$param1;
});
Route::get('/mahasiswa/{param1?}',[MahasiswaController::class,'show']);

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/matakuliah/{kodeMatakuliah?}', [MatakuliahController::class, 'show']);

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('/home',[HomeController::class,'index'])->name('home');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
