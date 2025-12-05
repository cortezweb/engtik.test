<?php

namespace App\Livewire;

use Livewire\Component;

class CourseStatus extends Component
{

    public $course;
    public $sections;
    public $lessons;
    public $current;

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