<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'social_type',
        'social_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
