<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Log;

class Subject extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'cover',
        'trending',
    ];

    protected $dates = ['deleted_at'];

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }

    public function getCoverAttribute()
    {
        return asset(config('setup.subject_cover_path') . $this->attributes['cover']);
    }

    public function userPlans()
    {
        $this->hasManyThrough(UserPlan::class, Plan::class);
    }
}
