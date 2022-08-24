<?php

use App\Http\Controllers\admin\categoriesController;
use App\Http\Controllers\admin\homeController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\admin\subCategoriesController;
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

Route::get('/', function () {
    return view('authntaction.sing-up');
})->name('sing-up');
Route::get('/sing-in', function () {
    return view('authntaction.sing-in');
})->name('sing-in');
Route::get('/check-domein/{name}', [homeController::class, 'check_domein']);

// Route::get('/login', function () {return view('authntaction.sing-up');});


Route::middleware(['auth'])->group(function () {
    Route::get('/', [homeController::class, 'index'])->name('home');
    /****************** start categories *******************************/
    Route::prefix('category')->group(function () {
        Route::get('/', [categoriesController::class, 'index'])->name('category');
        Route::get('/create', [categoriesController::class, 'create'])->name('category.create');
        Route::post('/submit', [categoriesController::class, 'submit'])->name('category.submit');
        Route::get('/edit/{id}', [categoriesController::class, 'edit'])->name('category.edit');
        Route::post('/update/{id}', [categoriesController::class, 'update'])->name('category.update');
        Route::get('/delete/{id}', [categoriesController::class, 'delete'])->name('category.delete');
        Route::get('/changeStatus/{id}', [categoriesController::class, 'changeStatus'])->name('category.changeStatus');

    });
    /****************** end categories *******************************/

    /****************** start categories *******************************/
    Route::prefix('subCategory')->group(function () {
        Route::get('/', [subCategoriesController::class, 'index'])->name('subCategory');
        Route::get('/create', [subCategoriesController::class, 'create'])->name('subCategory.create');
        Route::post('/submit', [subCategoriesController::class, 'submit'])->name('subCategory.submit');
        Route::get('/edit/{id}', [subCategoriesController::class, 'edit'])->name('subCategory.edit');
        Route::get('/changeStatus/{id}', [subCategoriesController::class, 'changeStatus'])->name('subCategory.changeStatus');

        // Route::post('/update/{id}', [categoriesController::class, 'update'])->name('category.update');
        // Route::get('/delete/{id}', [categoriesController::class, 'delete'])->name('category.delete');
    });
    /****************** end categories *******************************/

      /****************** start products *******************************/
      Route::prefix('porducts')->group(function () {
        Route::get('/', [productController::class, 'index'])->name('porducts');
        Route::get('/create', [productController::class, 'create'])->name('porducts.create');
        Route::post('/submit', [productController::class, 'submit'])->name('porducts.submit');
        Route::get('/edit/{id}', [productController::class, 'edit'])->name('porducts.edit');
        // Route::post('/update/{id}/{category}', [categoriesController::class, 'update'])->name('category.update');
        // Route::get('/delete/{id}/{category}', [categoriesController::class, 'delete'])->name('category.delete');
    });
    /****************** end porducts *******************************/

});
