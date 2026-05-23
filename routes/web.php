<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home;
use App\Http\Controllers\admin;
use App\Http\Controllers\AuthController;

//Route::get('/', function () {
//   return view('index');
//});
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/admin', function () {
    return view('admin.dashboard_admin');
})->middleware('auth');

Route::post('/store_destinasi', [admin::class, 'store_destinasi']);
Route::post('/update_destinasi/{id}', [admin::class, 'update_destinasi']);
Route::get('/admin_destinasi', [admin::class, 'admin_destinasi']);
Route::delete('/destinasi_delete/{id}', [admin::class, 'destroy_destinasi']);

Route::post('/store_acara', [admin::class, 'store_acara']);
Route::post('/update_acara/{id}', [admin::class, 'update_acara']);
Route::get('/admin_acara', [admin::class, 'admin_acara']);
Route::delete('/acara_delete/{id}', [admin::class, 'destroy_acara']);

Route::post('/store_pegawai', [admin::class, 'store_pegawai']);
Route::post('/update_pegawai/{id}', [admin::class, 'update_pegawai']);
Route::get('/admin_pegawai', [admin::class, 'admin_pegawai']);
Route::delete('/pegawai_delete/{id}', [admin::class, 'destroy_pegawai']);

Route::post('/store_kuliner', [admin::class, 'store_kuliner']);
Route::post('/update_kuliner/{id}', [admin::class, 'update_kuliner']);
Route::get('/admin_kuliner', [admin::class, 'admin_kuliner']);
Route::delete('/kuliner_delete/{id}', [admin::class, 'destroy_kuliner']);

Route::post('/store_budaya', [admin::class, 'store_budaya']);
Route::post('/update_budaya/{id}', [admin::class, 'update_budaya']);
Route::get('/admin_budaya', [admin::class, 'admin_budaya']);
Route::delete('/budaya_delete/{id}', [admin::class, 'destroy_budaya']);

Route::post('/store_berita', [admin::class, 'store_berita']);
Route::post('/update_berita/{id}', [admin::class, 'update_berita']);
Route::get('/admin_berita', [admin::class, 'admin_berita']);
Route::delete('/berita_delete/{id}', [admin::class, 'destroy_berita']);

Route::get('/admin_comment', [admin::class, 'admin_komentar']);
Route::post('/comments_admin', [admin::class, 'storecomment_admin']);
Route::get('/getcomments_admin', [admin::class, 'getcomment_admin']);
Route::post('/delete_comments_by_range', [Admin::class, 'deletecommentByRange']);

Route::post('/ratingdestinasi', [AuthController::class, 'store_desrating']);
Route::get('/getratingdestinasi/{id}', [AuthController::class, 'getDesrating']);

Route::post('/ratingkuliner', [AuthController::class, 'store_kulrating']);
Route::get('/getratingkuliner/{id}', [AuthController::class, 'getKulrating']);

Route::get('/', [home::class, 'index']);
Route::get('/login', [home::class, 'login']);
Route::get('/beranda', [home::class, 'beranda']);
Route::get('/acara', [home::class, 'event']);
Route::get('/profil', [home::class, 'profil']);
Route::get('/informasi', [home::class, 'informasi'])->name('informasi');
Route::get('/destinasi', [home::class, 'destinasi'])->name('destinasi');
Route::post('/rating', [home::class, 'rating']);
Route::post('/comment', [home::class, 'store_komentar']);
Route::post('/comments', [home::class, 'store_comment']);
Route::get('/getcomments', [home::class, 'getcomments']);
Route::post('/comment', [home::class, 'store_komentar']);

Route::get('/admin', [admin::class, 'admin']);


Route::post('/translate', [AuthController::class, 'translate']);
Route::get('/search-all', [AuthController::class, 'search']);