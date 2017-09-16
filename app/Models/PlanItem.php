<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanItem extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'note',
        'start_date',
        'due_date',
    ];

    public function userPlanItems()
    {
        return $this->hasMany(UserPlanItem::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function book()
    {
        return $this->hasOne(Book::class);
    }
}
