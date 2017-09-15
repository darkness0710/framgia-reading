<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
}
