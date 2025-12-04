<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        return view('courses.index');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function myCourses()
    {

        $courses = auth()->user()->courses_enrolled;

        return view('courses.my-courses', compact('courses'));
    }

    public function status(Course $course, Lesson $lesson = null)
    {




            // Recuperar las secciones y lecciones publicadas ordenadas
            $course->load(['sections' => function($query) {
                $query->orderBy('position', 'asc')
                    ->with(['lessons' => function($query){
                        $query->orderBy('position', 'asc')
                            ->where('is_published', true);
                    }]);
            }]);
            // Buscar la primera lección publicada
            $lessons = $course->sections->pluck('lessons')->collapse();


            //Sin lección, buscar la lección actual del usuario en el curso
        if (!$lesson) {

            $lesson = Lesson::whereHas('section', function($query) use ($course) {
                $query->where('course_id', $course->id);
            })->whereHas('users', function($query)
                {
                    $query->where('user_id', auth()->id())
                        ->where('current', true);
            })
            ->first();

            if(!$lesson){
                $lesson = $lessons->first();
            }

            // Redirigir correctamente
            return redirect()->route('courses.status', [$course, $lesson]);
        }
            // Si la lección no pertenece al curso, redirigir a la primera lección
        if (auth()->check()) {

            DB::table('course_lesson_user')
                ->where('user_id', auth()->id())
                ->where('course_id', $course->id)
                ->update([
                    'current' => false
                ]);

            DB::table('course_lesson_user')
                ->updateOrInsert([
                    'course_id' => $course->id,
                    'lesson_id' => $lesson->id,
                    'user_id' => auth()->id()
                ], [
                    'current' => true
                ]);

        }

        return view('courses.status', compact('course', 'lessons', 'lesson'));
    }
}
