<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'start_date',
        'due_date',
        'user_id',
        'subject_id',
        'summary',
        'rate',
        'description',
    ];

    protected $dates = ['deleted_at'];

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
