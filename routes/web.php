<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;

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
});
Route::prefix('admin')->middleware(['auth:admin'])->group(function() {
    // Roles CRUD
    Route::resource('roles', RoleController::class);

    // Permissions CRUD
    Route::resource('permissions', PermissionController::class);
    
});
// Route::middleware(['role:super_admin'])->group(function() {
//     Route::resource('roles', RoleController::class);
//     Route::resource('permissions', PermissionController::class);
// });
require __DIR__.'/auth.php';
