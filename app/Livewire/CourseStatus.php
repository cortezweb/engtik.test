<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CourseStatus extends Component
{

    public $course;
    public $sections;
    public $lessons;
    public $current;

    public $open_lessons;
    public $completed = false;

    public function mount(){
        $this->setOpenLessons();
        $this->setCompleted();
    }

    public function updated($property, $value)
    {
        if ($property == 'completed') {
            DB::table('course_lesson_user')
                ->where('lesson_id', $this->current->id)
                ->where('user_id', auth()->id())
                ->update(['completed' => $value]);

            $this->setOpenLessons();
        }
    }

    public function setOpenLessons(){

        $this->open_lessons = DB::table('course_lesson_user')
            ->where('course_id', $this->course->id)
            ->where('user_id', auth()->id())
            ->get();

    }


    public function setCompleted(){

        if (auth()->check() ) {

            $this->completed = $this->open_lessons
            ->where('lesson_id', $this->current->id)
            ->where('user_id', auth()->id())
            ->first()
            ->completed;

        }

    }



    public function previousLesson()
    {
        $index = $this->lessons->pluck('id')->search($this->current->id);

        if ($index == 0) {
            $lesson = $this->lessons->last();
        }else{
            $lesson = $this->lessons[$index - 1];
        }

        return redirect()->route('courses.status', [$this->course,$lesson['slug']]);
    }

    public function nextLesson()
    {
        $index = $this->lessons->pluck('id')->search($this->current->id);

        if ($index == $this->lessons->count() - 1) {
            $lesson = $this->lessons->first();
        }else{
            $lesson = $this->lessons[$index + 1];
        }

        return redirect()->route('courses.status', [$this->course,$lesson['slug']]);

    }

    public function render()
    {

        return view('livewire.course-status');
    }
}