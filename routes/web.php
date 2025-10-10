<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;        
use App\Http\Controllers\PermissionController;   
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\RecruiterController;
use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\ReportController;

Route::get('/', function () {
    return redirect()->route('login');
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

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    // Recruiters
    Route::resource('recruiters', RecruiterController::class);
    Route::post('recruiters/{id}/status', [RecruiterController::class, 'updateStatus'])
        ->name('recruiters.updateStatus');

    // Candidates
    Route::resource('candidates', CandidateController::class);
    Route::get('candidates/{candidate}/resume', [CandidateController::class, 'downloadResume'])
        ->name('candidates.resume');

    // Jobs
    Route::resource('jobs', JobController::class)->except(['show']);

    // Applications
    Route::get('applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::post('applications/{id}/status', [ApplicationController::class, 'updateStatus'])
        ->name('applications.updateStatus');
    Route::post('admin/applications', [App\Http\Controllers\Admin\ApplicationController::class, 'store'])
    ->name('applications.store');

    // Reports
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
});

require __DIR__ . '/auth.php';
