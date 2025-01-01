<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin routes
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('roles', RoleController::class)->except('show');
        Route::get('/roles/{roleId}/permissions', [RoleController::class, 'showAssignPermissionForm'])->name('roles.permissions');
        Route::post('/roles/{roleId}/assign-permission/{permissionId}', [RoleController::class, 'assignPermission'])->name('roles.assign-permission');
        Route::post('/roles/{roleId}/revoke-permission/{permissionId}', [RoleController::class, 'removePermission'])->name('roles.revoke-permission');

        Route::resource('permissions', PermissionController::class)->except('show');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/{userId}/roles', [UserController::class, 'showUserRoles'])->name('users.showUserRoles');
        Route::put('/users/{userId}/roles', [UserController::class, 'updateRoles'])->name('users.updateRoles');
    });

    // Shop routes
    Route::get('/shops', [ShopController::class, 'index'])->name('shops.index');

    // Product routes
    Route::get('/shops/{shopId}/products', [ProductController::class, 'getShopsProducts'])->name('products.getShopsProducts');

    // Order routes
    Route::post('/orders', [OrderController::class, 'createOrder'])->name('orders.createOrder');
});

require __DIR__ . '/auth.php';
