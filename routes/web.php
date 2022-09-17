<?php

use App\Http\Controllers\CutiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PegawaiController;

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
Route::get('/detail-pegawai/{id}', [PegawaiController::class, 'show']);

Route::match(['get', 'post'], '/edit-pegawai/{id}', [PegawaiController::class,'edit']);
Route::post('/edit-pegawai/{id}', [PegawaiController::class,'update']);


Route::get('/add-data-pegawai', [PegawaiController::class, 'add_data_pegawai']);
Route::post('/store-data-pegawai', [PegawaiController::class, 'store_add_data']);
Route::get('/delete{nip}', [PegawaiController::class, 'delete']);

//user
Route::get('/delete{id}', [UserController::class, 'delete']);
Route::match(['get', 'post'], '/edit{id}', [UserController::class,'edit']);

//cuti
Route::get('/data-cuti', [CutiController::class, 'index']);
Route::get('/tambah-data-cuti', [CutiController::class, 'add']);

Route::get('/home-simpeg', [UserController::class,'widget']);



