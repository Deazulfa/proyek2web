<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KasirController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
    return view('login');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class);
Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
Route::get('kasir', [KasirController::class, 'index'])->name('index-kasir');
Route::get('kasir/get-produk-id/{id?}', [KasirController::class, 'getProdukId']);
Route::post('kasir', [KasirController::class, 'pesanan'])->name('index-pesanan');
Route::get('kasir/nota/{id?}', [KasirController::class, 'nota'])->name('nota');
Route::get('report', [ReportController::class, 'index'])->name('report');
Route::get('all-report', [ReportController::class, 'printReport'])->name('print-all-report');
Route::get('today-print', [HomeController::class, 'todayPrint'])->name('today-print');
Route::get('cr-month-print', [HomeController::class, 'currentMonth'])->name('cr-month-print');
Route::get('notifications', [HomeController::class, 'getNotification'])->name('notif');

// Route::resource('product', )

// Route::get('/', function () {
//     return view('login');
// });

// Route::get('/home', function () {
//     return view('home', [
//         'title' => 'Home'
//     ]);
// });

// Route::get('/kasir', function () {
//     return view('kasir', [
//         'title' => 'Kasir'
//     ]);
// });


// Route::get('/nota', function () {
//     return view('nota_belanja', [
//         'title' => 'Nota'
//     ]);
// });

// Route::get('/form', function () {
//     return view('form', [
//         'title' => 'Form'
//     ]);
// });

// Route::get('/form_kategori', function () {
//     return view('form_kategori', [
//         'title' => 'Form_kategori'
//     ]);
// });

// Route::get('/form_produk', function () {
//     return view('form_produk', [
//         'title' => 'Form_produk'

//     ]);
// });

// Route::get('/input', function () {
//     return view('input_data', [
//         'title' => 'Input Data'
//     ]);
// });

// Route::get('/penjualan', function () {
//     return view('penjualan', [
//         'title' => 'Penjualan'
//     ]);
// });

// Route::get('/kategori', function () {
//     return view('kategori', [
//         'title' => 'kategori'
//     ]);
// });

// Route::get('/produk', function () {
//     return view('produk', [
//         'title' => 'produk'
//     ]);
// });

// Route::post('/simpan_kategori', 'KategoriController@simpan');
// Route::get('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
// Route::get('/input_data/store', [InputdataController::class, 'store'])->name('input_data.store');


