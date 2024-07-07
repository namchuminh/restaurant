<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\OrderController;


use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\WebFoodController;
use App\Http\Controllers\Web\WebCategoryController;
use App\Http\Controllers\Web\WebNewsController;
use App\Http\Controllers\Web\WebContactController;
use App\Http\Controllers\Web\WebCustomerController;
use App\Http\Controllers\Web\WebWishListController;
use App\Http\Controllers\Web\WebOrderController;

Route::prefix('admin')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('admin.login')->middleware('notadmin');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login.submit')->middleware('notadmin');
    Route::get('logout', [LogoutController::class, 'index'])->name('admin.logout')->middleware('admin');
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
        Route::resource('/food', FoodController::class)->names([
            'index' => 'admin.food.index',
            'create' => 'admin.food.create',
            'store' => 'admin.food.store',
            'show' => 'admin.food.show',
            'edit' => 'admin.food.edit',
            'update' => 'admin.food.update',
            'destroy' => 'admin.food.destroy',
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

        Route::get('/table/status/{id}', [TableController::class, 'status'])->name('admin.table.status');
        Route::resource('/table', TableController::class)->names([
            'index' => 'admin.table.index',
            'create' => 'admin.table.create',
            'store' => 'admin.table.store',
            'show' => 'admin.table.show',
            'edit' => 'admin.table.edit',
            'update' => 'admin.table.update',
            'destroy' => 'admin.table.destroy',
        ]);

        Route::get('/customer', [CustomerController::class, 'index'])->name('admin.customer.index');
        Route::get('/customer/block/{id}', [CustomerController::class, 'show'])->name('admin.customer.block');
        Route::post('/customer/block/{id}', [CustomerController::class, 'block'])->name('admin.customer.block.submit');

        Route::get('/contact', [ContactController::class, 'index'])->name('admin.contact.index');
        Route::get('/contact/view/{id}', [ContactController::class, 'view'])->name('admin.contact.view');
        
        Route::get('profile', [ProfileController::class, 'index'])->name('admin.profile.index');
        Route::post('profile/update', [ProfileController::class, 'update'])->name('admin.profile.update');
        
        Route::get('/config', [ConfigController::class, 'index'])->name('admin.config.index');
        Route::post('/config/update', [ConfigController::class, 'update'])->name('admin.config.update');

        Route::get('/order', [OrderController::class, 'index'])->name('admin.order.index');
        Route::get('/order/{code}', [OrderController::class, 'view'])->name('admin.order.view');
        Route::get('/order/create', [OrderController::class, 'index'])->name('admin.order.create');
        Route::get('/order/payment/{code}', [OrderController::class, 'payment'])->name('admin.order.payment');
    });
});

Route::get('/', [HomeController::class, 'index'])->name('web.home');

Route::get('/mon-an', [WebFoodController::class, 'index'])->name('web.food.list');
Route::get('/mon-an/{slug}', [WebFoodController::class, 'view'])->name('web.food.view');

Route::get('/loai-mon-an/{slug}', [WebCategoryController::class, 'view'])->name('web.category.view');

Route::get('/tin-tuc', [WebNewsController::class, 'index'])->name('web.news.list');
Route::get('/tin-tuc/{slug}', [WebNewsController::class, 'view'])->name('web.news.view');
Route::get('/tin-tuc/chuyen-muc/{slug}', [WebNewsController::class, 'show'])->name('web.news.category.show');

Route::get('/lien-he', [WebContactController::class, 'index'])->name('web.contact.index');
Route::post('/lien-he', [WebContactController::class, 'contact'])->name('web.news.contact');

Route::middleware(['guest.custom'])->group(function () {
    Route::get('/dang-nhap', [WebCustomerController::class, 'login'])->name('web.customer.login');
    Route::post('/dang-nhap', [WebCustomerController::class, 'login']);
    Route::get('/dang-ky', [WebCustomerController::class, 'register'])->name('web.customer.register');
    Route::post('/dang-ky', [WebCustomerController::class, 'register']);
});

Route::middleware(['auth.custom'])->group(function () {
    Route::get('/dang-xuat', [WebCustomerController::class, 'logout'])->name('web.customer.logout');
    Route::get('/khach-hang', [WebCustomerController::class, 'index'])->name('web.customer.index');

    Route::get('/yeu-thich', [WebWishListController::class, 'index'])->name('web.wishlist.index');
    Route::get('/yeu-thich/them/{id}', [WebWishListController::class, 'add'])->name('web.wishlist.add');
    Route::get('/yeu-thich/xoa/{id}', [WebWishListController::class, 'delete'])->name('web.wishlist.delete');

    Route::get('/dat-ban', [WebOrderController::class, 'index'])->name('web.order.index');
    Route::post('/dat-ban', [WebOrderController::class, 'order'])->name('web.order.order');
});



