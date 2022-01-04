<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MakulController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\Struktur1Controller;
use App\Http\Controllers\TmahasiswaController;
use App\Http\Controllers\TnilaiController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('register',[LoginController::class, 'register'])->name('register');
Route::post('simpanRegistrasi',[LoginController::class, 'simpanRegistrasi'])->name('simpanRegistrasi');
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('postLogin', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::group(['middleware' => ['auth', 'ceklevel:admin,dosen']], function (){
    Route::get('home', [HomeController::class, 'index'])->name('home');
    // dashboard
    Route::get('visimisi', [HomeController::class, 'visimisi'])->name('visimisi')->middleware('auth');
    Route::get('struktur', [StrukturController::class, 'struktur'])->name('struktur')->middleware('auth');
    Route::post('prosesStruktur', [StrukturController::class, 'prosesStruktur'])->name('prosesStruktur');
    Route::get('edit/{id}', [StrukturController::class, 'edit'])->name('edit');
    Route::patch('editProses/{id}', [StrukturController::class, 'editProcess'])->name('editProses');
    Route::get('deleteStruktur/{id}', [StrukturController::class, 'delete'])->name('delete');

    // Fitur dosen
    Route::get('dosen', [DosenController::class, 'index'])->name('dosen');
    Route::get('dosen/add', [DosenController::class, 'add']);
    Route::post('dosen', [DosenController::class, 'addProcess']);
    Route::get('dosen/edit/{id}', [DosenController::class, 'edit']);
    Route::patch('dosen/{id}', [DosenController::class, 'editProcess']);
    Route::get('deleteDosen/{id}', [DosenController::class, 'delete'])->name('delete');

    // Fitur makul
    Route::resource('/makul', MakulController::class);
    Route::get('deleteMakul/{id}', [MakulController::class, 'destroy'])->name('delete');
    // Fitur kelas
    Route::resource('/kelas', KelasController::class);
    Route::get('delete/{id}', [KelasController::class, 'destroy'])->name('delete');
    // Fitur Mahasiswa
    Route::resource('/mahasiswa', MahasiswaController::class);
    Route::get('deleteMahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('delete');
    // Fitur Nilai
    Route::resource('nilai', NilaiController::class);
    Route::get('deleteNilai/{id}', [NilaiController::class, 'destroy'])->name('delete');

    // Master 
    Route::resource('admin', UserController::class);
    Route::get('deleteAdmin/{id}', [UserController::class, 'destroy'])->name('delete');

    // Tampil
    Route::resource('Tmahasiswa', TmahasiswaController::class);
    Route::resource('Tstruktur', Struktur1Controller::class);
    Route::resource('Tnilai', TnilaiController::class);

});