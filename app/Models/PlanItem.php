<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanItem extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'note',
        'plan_id',
        'book_id',
        'duration',
        'summary',
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
        return $this->belongsTo(Book::class);
    }
}
