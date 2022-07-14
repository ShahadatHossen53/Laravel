<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostShowController;
use App\Models\Subcategory;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('category', categoryController::class);
Route::resource('subcategory', SubcategoryController::class);
Route::resource('posts', PostController::class);


Route::get('/test', function(){
    return view('admin.test');
})->name('admin.test');


Route::get('/', [PostShowController::class, 'index']);

require __DIR__.'/auth.php';



