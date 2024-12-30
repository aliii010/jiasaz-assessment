<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

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

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('roles', RoleController::class)->except('show');
    Route::get('/roles/{roleId}/permissions', [RoleController::class, 'showAssignPermissionForm'])->name('roles.permissions');
    Route::post('/roles/{roleId}/assign-permission/{permissionId}', [RoleController::class, 'assignPermission'])->name('roles.assign-permission');
    Route::post('/roles/{roleId}/revoke-permission/{permissionId}', [RoleController::class, 'removePermission'])->name('roles.revoke-permission');

    Route::resource('permissions', PermissionController::class)->except('show');
});

require __DIR__ . '/auth.php';
