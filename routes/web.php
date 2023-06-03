<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

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

Route::get('/view_settings', [CompanyController::class, 'view_settings'])->name('view_settings');
Route::get('/dashboard_company', [CompanyController::class, 'view_dashboard'])->name('dashboard_company');
Route::post('/store_profile', [CompanyController::class, 'storeProfile'])->name('store_profile');
Route::get('/data', [CompanyController::class, 'showDataPerusahaan'])->name('dataPerusahaan');
Route::get('/profilePerusahaan', [CompanyController::class, 'showProfile']);
Route::post('/tambahLowongan', [CompanyController::class, 'tambahLowongan'])->name('tambahLowongan');
Route::get('/getLowongan', [CompanyController::class, 'getAllLowongan'])->name('getAllLowongan');

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
