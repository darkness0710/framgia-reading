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
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function reviews()
    {
        return $this->morphMany(Review::class);
    }

    public function planItem()
    {
        return $this->belongsTo(PlanItem::class);
    }

    public function comments()
    {
        return $this->hasmanyThrough(Comment::class, Review::class);
    }
}
