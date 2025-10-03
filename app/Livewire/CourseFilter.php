<?php

namespace App\Livewire;

use App\Enums\CourseStatus;
use App\Models\category;
use App\Models\Course;
use App\Models\level;
use Livewire\Component;
use Livewire\WithPagination;

class CourseFilter extends Component
{
    use WithPagination;


    public $categories;
    public $levels;

    public $selectedCategories = [];
    public $selectedLevels = [];
    public $selectedPrices = [];

    public $search;

    public function updatingSearch(){

        $this->resetPage();
    }


    public function mount(){
        $this->categories = category::all();
        $this->levels = level::all();

    }


    public function render()
    {
        $courses = Course::where('status', CourseStatus::PUBLICADO)
        ->when($this->selectedCategories, function($query){
                $query->whereIn('category_id', $this->selectedCategories);
            })
        ->when($this->selectedLevels, function($query){
                $query->whereIn('level_id', $this->selectedLevels);
            })
        ->when($this->selectedPrices, function($query){
              if(count($this->selectedPrices) == 1){
                if($this->selectedPrices[0] == 'free'){
                    $query->where('price_id', '1');
                }
                if($this->selectedPrices[0] == 'premium'){
                    $query->where('price_id', '!=', 1);
                }
              }
            })

            ->when($this->search, function($query){
                $query->where('title', 'LIKE', '%' . $this->search . '%');
            })

        ->paginate(8);


        return view('livewire.course-filter', compact('courses'));
    }
}
