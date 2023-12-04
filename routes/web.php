<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieRateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingHistoryController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/movies', [MovieController::class, 'index'])->name('movie.index');

    Route::get('/movies/{id}/rate', [MovieRateController::class, 'create'])->name('movie.vote.create');
    Route::post('/movies/{id}/rate', [MovieRateController::class, 'store'])->name('movie.vote.store');

    Route::get('/ratings/history', [RatingHistoryController::class, 'index'])->name('rate.history.index');

    Route::get('/admin/users', [UserController::class, 'index'])->middleware('admin')->name('admin.users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{id}', [UserController::class, 'delete'])->name('admin.users.delete');
});


require __DIR__.'/auth.php';
