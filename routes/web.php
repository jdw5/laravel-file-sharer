<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserUsageController;
use App\Http\Controllers\SubscriptionController;

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

Route::get('/', HomeController::class)->name('home');
Route::get('/upload', UploadController::class)->name('uploader');
Route::get('/files', [FileController::class, 'index'])->name('files');
Route::post('/files/signed', [FileController::class, 'signed'])->name('files.signed');
Route::post('/files', [FileController::class, 'store'])->name('files.store');
Route::delete('/files/{file:uuid}', [FileController::class, 'destroy'])->name('files.destroy');

Route::get('/user/usage', UserUsageController::class)->name('user.usage');

Route::get('/plans', PlanController::class)->name('plans');

Route::get('/checkout/{plan:slug?}', CheckoutController::class)->name('checkout');

Route::post('/subscription', [SubscriptionController::class, 'store'])->name('subscription');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
