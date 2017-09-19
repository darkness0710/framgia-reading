<?php

namespace App\Base\Database;

use Illuminate\Database\Eloquent\Builder as BaseBuilder;

class Builder extends BaseBuilder
{
    public function whereLike($column, $value)
    {
        $character = [
            '%',
            '_',
            '\\',
        ];
        $replace = [
            '\%',
            '\_',
            '\\\\',
        ];
        $value = str_replace($character, $replace, $value);
        
        return parent::where($column, 'like', '%' . $value . '%', 'and');
    }
}
