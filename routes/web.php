<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('admin.login')->middleware('notadmin');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login.submit')->middleware('notadmin');
    Route::middleware('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('/category', CategoryController::class)->names([
            'index' => 'admin.category.index',
            'create' => 'admin.category.create',
            'store' => 'admin.category.store',
            'show' => 'admin.category.show',
            'edit' => 'admin.category.edit',
            'update' => 'admin.category.update',
            'destroy' => 'admin.category.destroy',
        ]);
        Route::resource('/news', NewsController::class)->names([
            'index' => 'admin.news.index',
            'create' => 'admin.news.create',
            'store' => 'admin.news.store',
            'show' => 'admin.news.show',
            'edit' => 'admin.news.edit',
            'update' => 'admin.news.update',
            'destroy' => 'admin.news.destroy',
        ]);
    });
});
