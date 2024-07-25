<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/', [AdminController::class, 'index']);

Route::get('about', [AdminController::class, 'displayAbout'])->name('about');

Route::get('contact', [AdminController::class, 'displayContact'])->name('contact');


Route::get('test/{id}', function ($id) {
    return "test ID: {$id}<br>" . gettype($id);
});

Route::get('admin/chrwyn', function () {
    return "Admin Chrwyn";
})->name('admin.chrwyn');

Route::fallback(function () {
    return "Route not found";
});

Route::prefix('blog')->group(function () {
    Route::get('/', [AdminController::class, 'getAllBlogs']);
    Route::get('insert', [AdminController::class, 'insertPage']);
    Route::post('insert', [AdminController::class, 'insertBlog']);
    Route::get('update/{id}', [AdminController::class, 'updateBlogPage']);
    Route::post('update/{id}', [AdminController::class, 'updateBlog']);
    Route::get('delete/{id}', [AdminController::class, 'deleteBlog']);
});
