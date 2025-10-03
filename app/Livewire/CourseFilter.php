<?php

namespace App\Livewire;

use App\Models\category;
use App\Models\level;
use Livewire\Component;

class CourseFilter extends Component
{
    public $categories;
    public $levels;


    public function mount(){
        $this->categories = category::all();
        $this->levels = level::all();

    }


    public function render()
    {
        return view('livewire.course-filter');
    }
}