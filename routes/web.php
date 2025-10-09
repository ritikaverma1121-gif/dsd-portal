<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;        
use App\Http\Controllers\PermissionController;   
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\RecruiterController;
use App\Http\Controllers\Admin\CandidateController;


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

Route::middleware('auth')->group(function () {
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('recruiters', RecruiterController::class);
    Route::post('/admin/recruiters/{id}/status', [App\Http\Controllers\Admin\RecruiterController::class, 'updateStatus'])
    ->name('admin.recruiters.updateStatus');
    Route::post('recruiters/{id}/status', [RecruiterController::class, 'updateStatus'])->name('recruiters.updateStatus');
    Route::resource('candidates', CandidateController::class);
    Route::resource('jobs', JobController::class)->except(['show']);
});

require __DIR__.'/auth.php';
