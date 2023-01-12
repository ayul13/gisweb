<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\lokasiController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\AdminHomeController;
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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");
Route::get('/admin', 'App\Http\Controllers\admin\AdminHomeController@index')->name("admin.index"); 
// Route::get('/admin/kategori', 'App\Http\Controllers\Admin\AdminKategoriController@index')->name("admin.kategori.index");

// Route::get('/kategori', 'App\Http\Controllers\kategoriController@index')->name("kategori.index");

Route::resource('/kategori', kategoriController::class);

Route::resource('/lokasi', lokasiController::class);

Route::resource('/wilayah', WilayahController::class);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
