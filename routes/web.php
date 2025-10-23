<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\WelcomeController;
use App\Models\Course;
use App\Models\Lesson;
use CodersFree\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

Route::get('/', [ WelcomeController::class, 'index' ])
        ->name('welcome');

Route::get('courses', [CourseController::class, 'index'])
        ->name('courses.index');

Route::get('courses/{course}', [CourseController::class, 'show'])
        ->name('courses.show');

Route::get('cart', [CartController::class, 'index'])
        ->name('cart.index');

Route::get('prueba', function(){

    Cart::instance('shopping');
    return Cart::content();

});
