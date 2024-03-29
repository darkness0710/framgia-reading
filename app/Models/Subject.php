<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'description',
        'cover',
        'trending',
    ];

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }

    public function getCoverAttribute()
    {
        return $this->attributes['cover'] = config('setup.subject_cover_path')
            . $this->attributes['cover'];
    }

    public function userPlans()
    {
        $this->hasManyThrough(UserPlan::class, Plan::class);
    }
}
