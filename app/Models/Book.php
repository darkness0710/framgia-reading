<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
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
    ];

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
