<?php

namespace App\Models;

use App\Observers\SectionObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;


#[ObservedBy([SectionObserver::class])]

class Section extends Model
{
    protected $fillable = [
        'name',
        'course_id',
        'position',
    ];

    //relacion uno a muchos inversa

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

     //relacion uno a muchos
     public function lessons()
     {
         return $this->hasMany(Lesson::class);
     }


}