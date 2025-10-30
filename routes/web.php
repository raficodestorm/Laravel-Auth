<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserManagementController;
use Illuminate\Support\Facades\Route;

// home
Route::get('/', function () {
    return view('welcome');
});

// auth (login/register) - using our controllers
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// password reset routes handled by Breeze/Fortify - if using built-in, ensure routes are published

// dashboards (protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/user', function () {
        return view('dashboards.user');
    })->name('dashboard.user')->middleware('role:user,admin,counter_manager'); // user page - accessible by user (admin can also view if needed)

    Route::get('/dashboard/manager', function () {
        return view('dashboards.manager');
    })->name('dashboard.manager')->middleware('role:counter_manager');

    Route::get('/dashboard/admin', function () {
        return view('dashboards.admin');
    })->name('dashboard.admin')->middleware('role:admin');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    // Update Profile Information
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Delete Account (optional, if you want to keep Breeze's delete)
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// admin user management
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('users', [UserManagementController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserManagementController::class, 'create'])->name('users.create');
    Route::post('users', [UserManagementController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [UserManagementController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserManagementController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');
});




require __DIR__ . '/auth.php';
