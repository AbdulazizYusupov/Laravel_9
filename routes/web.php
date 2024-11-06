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
Route::middleware(['check:admin,read,update,delete,add'])->group(function () {
    Route::get('/student', [\App\Http\Controllers\StudentController::class, 'index'])->name('student');
    Route::get('/post', [\App\Http\Controllers\PostController::class, 'index'])->name('post');
});
//create
Route::middleware(['check:admin,add'])->group(function () {
    Route::get('/student-create', [\App\Http\Controllers\StudentController::class, 'create'])->name('student.create')->middleware(Check::class . ':admin,add');
    Route::post('/student-create', [\App\Http\Controllers\StudentController::class, 'store'])->name('student.store')->middleware(Check::class . ':admin,add');

    Route::get('/post-create', [\App\Http\Controllers\PostController::class, 'create'])->name('post.create')->middleware(Check::class . ':admin,add');
    Route::post('/post-create', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store')->middleware(Check::class . ':admin,add');
});
//read
Route::middleware(['check:admin,read'])->group(function () {
    Route::get('/student-show/{id}', [\App\Http\Controllers\StudentController::class, 'show'])->name('student.show')->middleware(Check::class . ':admin,read');
    Route::get('/post-show/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.show')->middleware(Check::class . ':admin,read');
});
//update
Route::middleware(['check:admin,update'])->group(function () {
    Route::put('/student-update{student}', [\App\Http\Controllers\StudentController::class, 'update'])->name('student.update')->middleware(Check::class . ':admin,update');
    Route::put('/post-update{post}', [\App\Http\Controllers\PostController::class, 'update'])->name('post.update')->middleware(Check::class . ':admin,update');
});
//delete
Route::middleware(['check:admin,delete'])->group(function () {
    Route::get('/student-delete{id}', [\App\Http\Controllers\StudentController::class, 'destroy'])->name('student.destroy')->middleware(Check::class . ':admin,delete');
    Route::get('/post-delete/{id}', [\App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy')->middleware(Check::class . ':admin,delete');
});
//only admin
Route::middleware(['check:admin'])->group(function () {
    Route::get('/users',[AuthController::class, 'index'])->name('user');
    Route::put('/users/{user}',[AuthController::class, 'update'])->name('user.update');
    Route::get('/users-delete/{id}',[AuthController::class, 'destroy'])->name('user.destroy');
});







