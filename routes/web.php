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
