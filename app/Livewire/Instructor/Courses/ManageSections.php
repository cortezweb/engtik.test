<?php

namespace App\Livewire\Instructor\Courses;

use App\Models\Lesson;
use App\Models\Section;
use Livewire\Attributes\On;
use Livewire\Component;

class ManageSections extends Component
{

    public $course;
    public $name;
    public $sections;

    public $sectionEdit = [
        'id' => null,
        'name' => null,
    ];

    public $sectionPositionCreate = [

    ];

    public $orderLessons;

    public function mount()
    {
        $this->getSections();
    }

    #[On('refreshOrderLessons')]
    public function getSections()
    {
        $this->sections = Section::where('course_id', $this->course->id)
        ->with(['lessons' => function ($query){
            $query->orderBy('position', 'asc');
        }])
        ->orderBy('position', 'asc' )
        ->get();

    $this->orderLessons = $this->sections
        ->pluck('lessons')
        ->collapse()
        ->pluck('id');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->course->sections()->create([
            'name' => $this->name
        ]);

        $this->reset('name');

        $this->getSections();
    }


    public function storePosition($sectionId)
    {
        $this->validate([
            "sectionPositionCreate.{$sectionId}.name" => 'required|string|max:255',
        ]);

        $position = Section::find($sectionId)->position;
        Section::where('course_id', $this->course->id)
            ->where('position', '>=', $position)
            ->increment('position');

        $this->course->sections()->create([
            'name' => $this->sectionPositionCreate[$sectionId]['name'],
            'position' => $position,
        ]);

        $this->getSections();

        $this->dispatch('close-section-position-create');

        $this->reset('sectionPositionCreate');

    }



    public function edit(Section $section )
    {
       $this->sectionEdit = [
        'id'=>$section->id,
        'name'=>$section->name,
       ];
    }

    public function update()
    {
        $this->validate([
            'sectionEdit.name' => 'required|string|max:255',
        ]);

        Section::find($this->sectionEdit['id'])->update([
            'name' => $this->sectionEdit['name'],
        ]);

        $this->reset('sectionEdit');

        $this->getSections();
    }


    public function destroy(Section $section)
    {
        $section->delete();
        $this->getSections();


        $this->dispatch('swal', [
            "icon" => "success",
            "title" => "Eliminado!",
            "text" => "Section eliminada correctamente",
        ]);

    }

    public function sortSections($sorts)
    {
        foreach ($sorts as $position => $sectionId) {
            Section::find($sectionId)->update([
                'position' => $position + 1
            ]);
        }

        $this->getSections();

    }

    #[On('sortLessons')]
    public function sortLessons($sorts, $sectionId)
    {
        foreach ($sorts as $position => $lessonId) {
            Lesson::find($lessonId)->update([
                'position' => $position + 1,
                'section_id' => $sectionId,
            ]);
        }
        $this->getSections();
    }


    public function render()
    {
        return view('livewire.instructor.courses.manage-sections');
    }
}
