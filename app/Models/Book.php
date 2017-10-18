<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'author',
        'status',
        'publisher',
        'pages',
        'cover',
        'rate',
        'summary',
        'speak',
        'year',
    ];

     public function getCoverAttribute()
    {
        return asset(config('setup.book_cover_path') . $this->attributes['cover']);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function reviews()
    {
        return $this->morphMany(Review::class);
    }

    public function planItems()
    {
        return $this->hasMany(PlanItem::class);
    }

    public function userPlanItems()
    {
        return $this->hasMany(UserPlanItem::class);
    }

    public function comments()
    {
        return $this->hasmanyThrough(Comment::class, Review::class);
    }
}
