<?php
use App\Http\Controllers\Admin\Web\ReigsterController;
use App\Http\Controllers\Admin\Web\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Web\LoginController;
use App\Http\Controllers\Admin\Web\ForgotPasswordController;

Route::prefix('admin')->name('admin.')->group(function () {
    // Public routes (no middleware here!)
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.submit');

    Route::get('register', [ReigsterController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [ReigsterController::class, 'register'])->name('register.submit');



    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');




    // Protected admin routes
    Route::middleware('auth:admin, is_active')->group(function () {
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('dashboard', fn() => view('admin.dashboard'))->name('dashboard');
        Route::get('index', [AdminController::class, 'showAdminIndex'])->name('index');
        Route::get('data', [AdminController::class, 'data'])->name('data');



    });
});

?>