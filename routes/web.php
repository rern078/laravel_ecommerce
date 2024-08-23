<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('admin');

Route::get('/user-side', function () {
    return view('client_side');
})->middleware('auth');
// Route::get('/', function () {
//     return redirect('/login');
// });
Auth::routes();
// Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware('admin');
Route::get('/home', [AdminController::class, 'home'])->name('home');

Route::post('/products', [AdminController::class, 'addProducts'])->name('addProducts');
Route::get('/add-products', [AdminController::class, 'products'])->name('products');
Route::get('/list-products', [AdminController::class, 'listProducts'])->name('listProducts');
Route::get('/list-products/{id}/edit', [AdminController::class, 'editProducts'])->name('editProducts');
Route::put('/products/{id}', [AdminController::class, 'updateProducts'])->name('updateProducts');
Route::delete('/products/{id}', [AdminController::class, 'deleteProducts'])->name('deleteProducts');

Route::post('/categories', [AdminController::class, 'addCategories'])->name('addCategories');
Route::get('/add-categories', [AdminController::class, 'categories'])->name('categories');
Route::get('/list-categories', [AdminController::class, 'listCategories'])->name('listCategories');
Route::get('/list-categories/{id}/edit', [AdminController::class, 'editCategory'])->name('editCategory');
Route::put('/categories/{id}', [AdminController::class, 'updateCategories'])->name('updateCategories');
Route::delete('/categories/{id}', [AdminController::class, 'deleteCategory'])->name('deleteCategory');
