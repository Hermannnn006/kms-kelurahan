<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GambarController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\JoblistController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\DashboardPegawaiController;

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
    return view('beranda');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'admin']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/kirim-pesan', [ForumController::class, 'kirimPesan']);
Route::post('/increment-forum-view', [ForumController::class, 'incrementForumView']);

Route::resource('/pegawai', PegawaiController::class);
Route::resource('/joblist', JoblistController::class);
Route::resource('/pekerjaan', PekerjaanController::class);
Route::resource('/forum', ForumController::class)->middleware('auth');
Route::resource('/gambar', GambarController::class);
Route::resource('/profil', ProfilController::class)->middleware('auth');

Route::resource('/dashboard/pegawai', DashboardPegawaiController::class)->middleware(['auth', 'admin']);