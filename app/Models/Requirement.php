<?php

namespace App\Models;

use App\Observers\RequirementObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;


#[ObservedBy([RequirementObserver::class])]

class Requirement extends Model
{
    protected $fillable = [
        'name',
        'course_id',
        'position'
    ];
}