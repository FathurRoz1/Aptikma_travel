<?php

use App\Http\Controllers\CBank;
use App\Http\Controllers\CBooking;
use App\Http\Controllers\CDashboard;
use App\Http\Controllers\CJadwal;
use App\Http\Controllers\CKota;
use App\Http\Controllers\CLogin;
use App\Http\Controllers\COrder;
use App\Http\Controllers\CVendor;
use Illuminate\Support\Facades\Route;

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

Route::get('/jalandarat/login', function () {
    return view('login');
});


/* Route::get('/login', [CLogin::class, 'login'])->name('login'); */
Route::get('/login', [CLogin::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [CLogin::class, 'authenticate']);
Route::get('/logout', [CLogin::class, 'logout']);

Route::get('jalandarat/admin', [CDashboard::class, 'index']);

Route::resource('jalandarat/jadwal', CJadwal::class);
Route::post('jalandarat/jadwal/tambah', [CJadwal::class, 'store']);
Route::get('jalandarat/jadwal/edit/{id}', [CJadwal::class, 'edit']);
Route::get('jalandarat/jadwal/hapus/{id}', [CJadwal::class, 'destroy']);
Route::get('jalandarat/jadwal/detail/{id}', [CJadwal::class, 'show']);

Route::resource('jalandarat/vendor', CVendor::class);
Route::post('jalandarat/vendor/tambah', [CVendor::class, 'store']);
Route::get('jalandarat/vendor/edit/{id}', [CVendor::class, 'edit']);
Route::post('jalandarat/vendor/update', [CVendor::class, 'store']);
Route::get('jalandarat/vendor/hapus/{id}', [CVendor::class, 'destroy']);
Route::get('jalandarat/vendor/detail/{id}', [CVendor::class, 'show']);

Route::resource('jalandarat/kota', CKota::class);
Route::post('jalandarat/kota/tambah', [CKota::class, 'store']);
Route::get('jalandarat/kota/edit/{id}', [CKota::class, 'edit']);
Route::get('jalandarat/kota/hapus/{id}', [CKota::class, 'destroy']);
Route::get('jalandarat/kota/detail/{id}', [CKota::class, 'show']);

Route::resource('jalandarat/bank', CBank::class);
Route::post('jalandarat/bank/tambah', [CBank::class, 'store']);
Route::get('jalandarat/bank/edit/{id}', [CBank::class, 'edit']);
Route::get('jalandarat/bank/hapus/{id}', [CBank::class, 'destroy']);
Route::get('jalandarat/bank/detail/{id}', [CBank::class, 'show']);

Route::get('jalandarat/order', [COrder::class, 'index']);
Route::get('jalandarat/order/hapus/{id}', [COrder::class, 'destroy']);
Route::get('jalandarat/order/detail/{id}', [COrder::class, 'detailOrder']);


Route::get('jalandarat', [CBooking::class, 'index']);
Route::get('jalandarat/pilihJadwal', [CBooking::class, 'search']);
Route::get('jalandarat/booking', [CBooking::class, 'booking']);
Route::get('jalandarat/pemesanan', [CBooking::class, 'pemesanan']);
Route::get('jalandarat/bayar', [CBooking::class, 'bayar']);

Route::get('pemesanan', function () {
    return view('pemesanan.pemesanan');
});
Route::get('pembayaran', function () {
    return view('pemesanan.pembayaran');
});

Route::get('bayar', function () {
    return view('pemesanan.bank_pembayaran');
});