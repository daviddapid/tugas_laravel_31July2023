<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\admin\ContactController as AdminContactController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProjectController as AdminProjectController;
use App\Http\Controllers\admin\SiswaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/siswa', SiswaController::class);
    Route::resource('/project', AdminProjectController::class);
    Route::resource('/contact', AdminContactController::class);
});
