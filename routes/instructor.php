<?php

use App\Http\Controllers\Instructor\CourseController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('instructor.dashboard');
// });

Route::redirect('/', '/instructor/courses')
->name('home');

/* Course */
Route::resource('courses', CourseController::class);

Route::get('courses/{course}/video', [CourseController::class, 'video'])
    ->name('courses.video');

Route::get('courses/{course}/goals', [CourseController::class, 'goals'])
    ->name('courses.goals');

Route::get('courses/{course}/requirements', [CourseController::class, 'requirements'])
    ->name('courses.requirements');

Route::get('courses/{course}/curriculum', [CourseController::class, 'curriculum'])
    ->name('courses.curriculum');
