<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\Company;

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
    return view('welcome');
});

// Company Controller
Route::get('/view_settings/{id}', [CompanyController::class, 'view_settings'])->name('view_settings');
Route::get('/dashboard_company/{id}', [CompanyController::class, 'view_dashboard'])->name('dashboard_company');
Route::post('/store_profile/{id}', [CompanyController::class, 'storeProfile'])->name('store_profile');
Route::get('/data', [CompanyController::class, 'showDataPerusahaan'])->name('dataPerusahaan');
Route::get('/profilePerusahaan', [CompanyController::class, 'showProfile']);
Route::post('/tambahLowongan', [CompanyController::class, 'tambahLowongan'])->name('tambahLowongan');
Route::get('/getLowongan', [CompanyController::class, 'getAllLowongan'])->name('getAllLowongan');
Route::get('/destroy/{id}', [CompanyController::class, 'destroy'])->name('destroy');
Route::get('/edit/{loker}', [CompanyController::class, 'edit'])->name('edit');
Route::post('/update/{loker}', [CompanyController::class, 'update'])->name('update');


// Client Controller
Route::get('/getLoker', [ClientController::class, 'getLowongan'])->name('getLowongan');
Route::get('/lowongan/{lowongan}', [ClientController::class, 'show'])->name('lowongan.show');
Route::post('/daftarKerja/{id}', [ClientController::class, 'daftarPerusahaan'])->name('daftarKerja');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/redirect', [HomeController::class, 'redirect']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
