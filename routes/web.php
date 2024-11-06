<?php

use App\Http\Middleware\Check;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\AuthController::class, 'loginPage'])->name('loginPage');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');

Route::get('/register', [\App\Http\Controllers\AuthController::class, 'registerPage'])->name('registerPage');
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');

Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('/student', [\App\Http\Controllers\StudentController::class, 'index'])->name('student');
Route::get('/student-create', [\App\Http\Controllers\StudentController::class, 'create'])->name('student.create')->middleware(Check::class . ':admin,add');
Route::post('/student-create', [\App\Http\Controllers\StudentController::class, 'store'])->name('student.store')->middleware(Check::class . ':admin,add');
Route::get('/student-show/{id}', [\App\Http\Controllers\StudentController::class, 'show'])->name('student.show')->middleware(Check::class . ':admin,read');;
Route::put('/student-update{student}', [\App\Http\Controllers\StudentController::class, 'update'])->name('student.update')->middleware(Check::class . ':admin,update');
Route::get('/student-delete{id}', [\App\Http\Controllers\StudentController::class, 'destroy'])->name('student.destroy')->middleware(Check::class . ':admin,delete');

Route::get('/post', [\App\Http\Controllers\PostController::class, 'index'])->name('post');
Route::get('/post-create', [\App\Http\Controllers\PostController::class, 'create'])->name('post.create')->middleware(Check::class . ':admin,add');
Route::post('/post-create', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store')->middleware(Check::class . ':admin,add');
Route::get('/post-show/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.show')->middleware(Check::class . ':admin,read');
Route::put('/post-update{post}', [\App\Http\Controllers\PostController::class, 'update'])->name('post.update')->middleware(Check::class . ':admin,update');
Route::get('/post-delete/{id}', [\App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy')->middleware(Check::class . ':admin,delete');
