<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Main\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('main.index');


//                        FIRST OPTION

//Route::group(['prefix' => 'categories'], function () {
//    Route::get('/', App\Http\Controllers\Category\IndexController::class)->name('categories.index');
//    Route::get('/create', App\Http\Controllers\Category\CreateController::class)->name('categories.create');
//    Route::post('/', App\Http\Controllers\Category\StoreController::class)->name('categories.store');
//    Route::get('/{category}/edit', App\Http\Controllers\Category\EditController::class)->name('categories.edit');
//    Route::get('/{category}', App\Http\Controllers\Category\ShowController::class)->name('categories.show');
//    Route::patch('/{category}', App\Http\Controllers\Category\UpdateController::class)->name('categories.update');
//    Route::delete('/{category}', App\Http\Controllers\Category\DeleteController::class)->name('categories.delete');
//});


//                        SECOND OPTION
Route::resource('/categories', CategoryController::class);


Route::group(['prefix' => 'products'], function () {
    Route::get('/', App\Http\Controllers\Product\IndexController::class)->name('product.index');
    Route::get('/create', App\Http\Controllers\Product\CreateController::class)->name('product.create');
    Route::post('/', App\Http\Controllers\Product\StoreController::class)->name('product.store');
    Route::get('/{product}/edit', App\Http\Controllers\Product\EditController::class)->name('product.edit');
    Route::get('/{product}', App\Http\Controllers\Product\ShowController::class)->name('product.show');
    Route::patch('/{product}', App\Http\Controllers\Product\UpdateController::class)->name('product.update');
    Route::delete('/{product}', App\Http\Controllers\Product\DeleteController::class)->name('product.delete');
});
