<?php

namespace App\Observers;

use App\Models\Section;

class SectionObserver
{
    public function creating($section)
    {
        if (!$section->position) {
            $section->position = Section::where('course_id', $section->course_id)->max('position') + 1;
        }
    }
}