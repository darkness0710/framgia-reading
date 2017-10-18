<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Log;

class Subject extends BaseModel
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
