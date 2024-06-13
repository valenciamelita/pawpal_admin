<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddProductController;
use App\Http\Controllers\ContactListController;
use App\Http\Controllers\EditProductController;
use App\Http\Controllers\TransactionHistoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersListController;
use App\Http\Controllers\MyAccountController;

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/', [HomeController::class, 'view'])->name('dashboard');

Route::get(('/add-product'),[AddProductController::class, 'view']);

Route::get('/shop-admin', [ShopController::class, 'view']);
Route::post('/my-account', [MyAccountController::class, 'saveUser'])->name('saveUser');



Route::get('/contact-list', [ContactListController::class, 'view']);

//Route::get(('/edit-product'),[EditProductController::class, 'view']);
Route::get('/product/edit/{id}', [EditProductController::class, 'editProduct']);
Route::post('product/update/{id}', [EditProductController::class, 'update'])->name('product.update');



Route::get('/transaction-history', [TransactionHistoryController::class, 'view']);
Route::get('/transaction/{id}', [TransactionHistoryController::class, 'show'])->name('transaction.detail');


Route::get(('/users-list'),[UsersListController::class, 'view']);
Route::get('/users-list', [UsersListController::class, 'index'])->name('userlist');

Route::get(('/login'),[LoginController::class, 'view']);
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// Route::get('/login', function () {
//     return view('login');
// });
Route::get('edit-product-{productId}', [EditProductController::class, 'view'])->name('edit.product');

Route::get('/wishlist', function () {
    return view('wishlist');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/coming-soon', function () {
    return view('coming-soon');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/my-account', function () {
    return view('my-account');
});

Route::get('/my-account', [MyAccountController::class, 'accountDetails']);

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

Route::get('/shop-4-column', function () {
    return view('shop-4-column');
});

Route::get('/single-product-variable', function () {
    return view('single-product-variable');
});

Route::get('/single-product', function () {
    return view('single-product');
});

Route::get('/contact-list', function () {
    return view('contact-list');
});

/*Route::get('/shop-admin', function () {
    return view('shop-admin');
});*/

Route::get('/contact-list', function () {
    return view('contact-list');
});

Route::get('/edit-product', function () {
    return view('edit-product');
});

Route::get('/add-product', function () {
    return view('add-product');
});

Route::get('/transaction-history', function () {
    return view('transaction-history');
});




