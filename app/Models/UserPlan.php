<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPlan extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'status',
        'assign_id',
        'plan_id',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'due_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function userPlanItems()
    {
        return $this->hasMany(UserPlanItem::class);
    }
}
