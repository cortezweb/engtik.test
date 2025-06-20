<?php

namespace App\Models;

use App\Enums\CourseStatus;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'description',
        'status',
        'image_path',
        'video_path',
        'welcome_message',
        'goodbye_message',
        'observation',
        'user_id',
        'category_id',
        'level_id',
        'price_id',
];

protected $casts = [
        'status' => CourseStatus::class,
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class);

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function price()
    {
        return $this->belongsTo(Price::class);
    }

}
