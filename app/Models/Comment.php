<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'review_id',
        'content',
    ];

    public function review()
    {
        return $this->belongsTo(Review::class);
    }
}
