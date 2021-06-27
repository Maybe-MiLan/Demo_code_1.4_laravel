<?php

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
// main
Route::get('/', ['App\Http\Controllers\Controller', 'indexView'])->name('indexView');

// registration
Route::post('/registration', ['App\Http\Controllers\UserController', 'reg'])->name('reg');

// login
Route::post('/login', ['App\Http\Controllers\UserController', 'login'])->name('login');

// logout
Route::get('/logout', ['App\Http\Controllers\UserController', 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    // create application view
    Route::get('/application/create', ['App\Http\Controllers\ApplicationsController', 'createView'])->name('application.create');
    Route::post('/application/create', ['App\Http\Controllers\ApplicationsController', 'create'])->name('application.create.post');

    // create application view
    Route::get('/application/my', ['App\Http\Controllers\ApplicationsController', 'my'])->name('application.my');

    // delete my application
    Route::get('/application/delete/{applications}', ['App\Http\Controllers\ApplicationsController', 'delete'])->name('application.delete');

    // admin route
    Route::middleware('admin')->group(function () {

        // admin panel
        Route::get('/admin', ['App\Http\Controllers\CategoryController', 'admin'])->name('admin');

        // admin panel create category
        Route::post('/admin/category', ['App\Http\Controllers\CategoryController', 'create'])->name('category.create');

        // admin panel delete category
        Route::get('/admin/delete/{category}', ['App\Http\Controllers\CategoryController', 'delete'])->name('category.delete');

        // admin application
        Route::get('/adminapp', ['App\Http\Controllers\ApplicationsController', 'adminapp'])->name('adminapp');

        // admin application
        Route::get('/adminapp/next/{applications}', ['App\Http\Controllers\ApplicationsController', 'next'])->name('next');

        // admin application
        Route::get('/adminapp/prev/{applications}', ['App\Http\Controllers\ApplicationsController', 'prev'])->name('prev');
    });
});
