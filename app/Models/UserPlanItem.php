<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPlanItem extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'status',
        'user_id',
        'plan_item_id',
        'user_plan_id',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'due_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userPlan()
    {
        return $this->belongsTo(UserPlan::class);
    }

    public function planItem()
    {
        return $this->belongsTo(PlanItem::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
