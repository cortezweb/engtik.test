<?php

namespace App\Livewire\Instructor\Courses;

use App\Models\Section;
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

    public function mount($course)
    {
        $this->getSections();
    }

    public function getSections()
    {
        $this->sections = Section::where('course_id', $this->course->id)
       ->orderBy('position', 'asc' )
       ->get();


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
    public function render()
    {
        return view('livewire.instructor.courses.manage-sections');
    }
}