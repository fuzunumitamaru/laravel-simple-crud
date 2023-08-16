<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreTrashController;

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

Route::redirect('/', 'login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//  ROLES
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::get('user/dashboard', [StoreController::class, 'index'])->middleware(['auth', 'role:user'])->name('user.dashboard');
//===

// CRUD
Route::resource('stores', StoreController::class);
Route::get('store-trash', [StoreTrashController::class, 'index'])->name('store_trash');
Route::patch('store-trash/restore/{id}', [StoreTrashController::class, 'restore'])->middleware(['auth', 'role:user'])->name('store_restore');
Route::delete('store-trash/destroy-permanent/{id}', [StoreTrashController::class, 'destroy_permanent'])->middleware(['auth', 'role:user'])->name('store_destroy_permanent');
