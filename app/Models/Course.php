<?php

namespace App\Models;

use App\Enums\CourseStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
protected function image(): Attribute
{
    return Attribute::make(
        get: function ($value, $attributes) {
            return $this->image_path
                ? Storage::url($this->image_path)
                : 'https://w7.pngwing.com/pngs/819/548/png-transparent-photo-image-landscape-icon-images-thumbnail.png';
        }
    );
}

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
