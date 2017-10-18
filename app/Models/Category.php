<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends BaseModel
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'description',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
