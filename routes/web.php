<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\Check;
use Illuminate\Support\Facades\Route;

//login
Route::get('/', [\App\Http\Controllers\AuthController::class, 'loginPage'])->name('loginPage');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
//register
Route::get('/register', [\App\Http\Controllers\AuthController::class, 'registerPage'])->name('registerPage');
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');
//logout
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
//pages
Route::get('/student', [\App\Http\Controllers\StudentController::class, 'index'])->name('student');
Route::get('/post', [\App\Http\Controllers\PostController::class, 'index'])->name('post');
Route::get('/category',[\App\Http\Controllers\CategoryController::class,'index'])->name('category');
Route::get('/product',[App\Http\Controllers\ProductController::class,'index'])->name('product');
Route::get('/car',[\App\Http\Controllers\CarController::class,'index'])->name('car');
//create
Route::get('/student-create', [\App\Http\Controllers\StudentController::class, 'create'])->name('student.create');
Route::post('/student-create', [\App\Http\Controllers\StudentController::class, 'store'])->name('student.store');

Route::get('/post-create', [\App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/post-create', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store');

Route::get('/category-create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
Route::post('/category-create', [\App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');

Route::get('/product-create', [\App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
Route::post('/product-create', [\App\Http\Controllers\ProductController::class, 'store'])->name('product.store');

Route::get('/car-create', [\App\Http\Controllers\CarController::class, 'create'])->name('car.create');
Route::post('/car-create', [\App\Http\Controllers\CarController::class, 'store'])->name('car.store');
//update
Route::put('/student-update{student}', [\App\Http\Controllers\StudentController::class, 'update'])->name('student.update');
Route::put('/post-update{post}', [\App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::put('/category-update{category}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
Route::put('/product-update{product}', [\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
Route::put('/car-update{car}', [\App\Http\Controllers\CarController::class, 'update'])->name('car.update');
//delete
Route::get('/student-delete{id}', [\App\Http\Controllers\StudentController::class, 'destroy'])->name('student.destroy');
Route::get('/post-delete/{id}', [\App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
Route::get('/category-delete/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('/product-delete/{id}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/car-delete/{id}', [\App\Http\Controllers\CarController::class, 'destroy'])->name('car.destroy');
//only admin
Route::middleware(['check:admin'])->group(function () {
    Route::get('/users', [AuthController::class, 'index'])->name('user');
    Route::get('/users-create', [AuthController::class, 'create'])->name('user.create');
    Route::post('/users-create', [AuthController::class, 'store'])->name('user.store');
    Route::put('/users/{user}', [AuthController::class, 'update'])->name('user.update');
    Route::get('/users-delete/{id}', [AuthController::class, 'destroy'])->name('user.destroy');
});







