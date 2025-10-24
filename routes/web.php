<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\WelcomeController;

use Illuminate\Support\Facades\Route;


Route::get('/', [ WelcomeController::class, 'index' ])
        ->name('welcome');

Route::get('courses', [CourseController::class, 'index'])
        ->name('courses.index');

Route::get('courses/{course}', [CourseController::class, 'show'])
        ->name('courses.show');

Route::get('courses-status/{course}', [CourseController::class, 'status'])
        ->name('courses.status');

Route::get('cart', [CartController::class, 'index'])
        ->name('cart.index');

Route::get('prueba', function(){

    dd(auth()->user()->courses_enrolled->contains(18));

});
