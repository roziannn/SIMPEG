<?php

use App\Http\Controllers\CutiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CovidController;

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
    return view('login.index');
})->name('login')->middleware('guest');

//Login source
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate']);

//Regist source
Route::get('/add-new-user', [UserController::class, 'add_user']);
Route::post('/add-new-user', [UserController::class, 'store']);

//logout
Route::post('/logout', [UserController::class, 'logout']);

//pegawai
Route::get('/data-pegawai', [PegawaiController::class, 'index'])->middleware('auth');
Route::get('/data-pegawai', [PegawaiController::class, 'data_pegawai'])->middleware('auth');
Route::get('/data-pegawai/detail-pegawai/{id}', [PegawaiController::class, 'show']);

Route::match(['get', 'post'], '/edit-pegawai/{id}', [PegawaiController::class,'edit']);
Route::post('/edit-pegawai/{id}', [PegawaiController::class,'update']);


Route::get('/data-pegawai/tambah_data_pegawai', [PegawaiController::class, 'add_data_pegawai']);
Route::post('/store-data-pegawai', [PegawaiController::class, 'store_add_data']);
Route::get('/delete{nip}', [PegawaiController::class, 'delete']);

//user
Route::get('/delete{id}', [UserController::class, 'delete']);
Route::match(['get', 'post'], '/edit{id}', [UserController::class,'edit']);


//cuti
Route::get('/data-cuti', [CutiController::class, 'show']);
Route::get('/tambah_data_cuti', [CutiController::class, 'add']);
Route::post('/store-data-cuti', [CutiController::class, 'store']);
Route::get('/delete-cuti/{id}', [CutiController::class, 'delete']);

Route::post('/getEmployees', [CutiController::class, 'getEmployees'])->name('getEmployees');

Route::match(['get', 'post'], '/edit-cuti{id}', [CutiController::class,'edit']);
Route::post('/edit-cuti/{id}', [CutiController::class,'update']);

Route::get('autocomplete', [CutiController::class, 'autocomplete'])->name('autocomplete'); 

//home-widget
Route::get('/home-simpeg', [UserController::class,'widget']);

//vaksin
//daftar_penerima
Route::get('/data-vaksin', [CovidController::class, 'index']);
Route::get('/data-vaksin/form', [CovidController::class, 'add_daftar_penerima']);


//rekap_penerima
Route::get('/data-vaksin/rekap_vaksin', [CovidController::class, 'rekap']);





