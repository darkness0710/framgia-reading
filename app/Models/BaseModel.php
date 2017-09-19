<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Base\Database\Builder;

class BaseModel extends Model
{
    public function newEloquentBuilder($query)
    {
        return new Builder($query);
    }
}
