<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\WelcomeController;
use App\Models\Course;
use App\Models\Lesson;
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

Route::get('prueba', function(){

    $course = Course::first();

    $sections = $course->sections()
            ->with(['lessons' => function ($query){
                $query->orderBy('position', 'asc');
            }])
            ->get();

    $orderLessons = $sections->pluck('lessons')
            ->collapse()
            ->pluck('id');

    return $orderLessons->search(6) + 1;

});
