<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'start_date',
        'due_date',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function userPlans()
    {
        return $this->hasMany(UserPlan::class);
    }

    public function reviews()
    {
        return $this->morphMany(Review::class);
    }

    public function planItems()
    {
        return $this->hasMany(PlanItem::class);
    }

    public function comments()
    {
        return $this->hasManyThrough(Comment::class, Review::class);
    }
}
