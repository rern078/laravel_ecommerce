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
// **************************** Product **************************** //
Route::post('/products', [AdminController::class, 'addProducts'])->name('addProducts');
Route::get('/add-products', [AdminController::class, 'products'])->name('products');
Route::get('/list-products', [AdminController::class, 'listProducts'])->name('listProducts');
Route::get('/list-products/{id}/edit', [AdminController::class, 'editProducts'])->name('editProducts');
Route::put('/products/{id}', [AdminController::class, 'updateProducts'])->name('updateProducts');
Route::delete('/products/{id}', [AdminController::class, 'deleteProducts'])->name('deleteProducts');
// **************************** Category **************************** //
Route::post('/categories', [AdminController::class, 'addCategories'])->name('addCategories');
Route::get('/add-categories', [AdminController::class, 'categories'])->name('categories');
Route::get('/list-categories', [AdminController::class, 'listCategories'])->name('listCategories');
Route::get('/list-categories/{id}/edit', [AdminController::class, 'editCategory'])->name('editCategory');
Route::put('/categories/{id}', [AdminController::class, 'updateCategories'])->name('updateCategories');
Route::delete('/categories/{id}', [AdminController::class, 'deleteCategory'])->name('deleteCategory');
// **************************** Sub Category **************************** //
Route::post('/sub-categories', [AdminController::class, 'addSubCategories'])->name('addSubCategories');
Route::get('/add-sub-categories', [AdminController::class, 'subCategories'])->name('subCategories');
Route::get('/list-sub-categories', [AdminController::class, 'listSubCategories'])->name('listSubCategories');
Route::get('/list-sub-categories/{id}/edit', [AdminController::class, 'editSubCategory'])->name('editSubCategory');
Route::put('/sub-categories/{id}', [AdminController::class, 'updateSubCategories'])->name('updateSubCategories');
Route::delete('/sub-categories/{id}', [AdminController::class, 'deleteSubCategory'])->name('deleteSubCategory');
// **************************** Brands **************************** //
Route::post('/brands', [AdminController::class, 'addBrands'])->name('addBrands');
Route::get('/add-brands', [AdminController::class, 'brands'])->name('brands');
Route::get('/list-brands', [AdminController::class, 'listBrands'])->name('listBrands');
Route::get('/list-brands/{id}/edit', [AdminController::class, 'editBrands'])->name('editBrands');
Route::put('/brands/{id}', [AdminController::class, 'updateBrands'])->name('updateBrands');
Route::delete('/brands/{id}', [AdminController::class, 'deleteBrands'])->name('deleteBrands');
