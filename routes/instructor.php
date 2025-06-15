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
