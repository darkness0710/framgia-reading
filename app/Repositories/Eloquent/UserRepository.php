<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use Auth;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository extends Repository implements UserRepositoryInterface
{
    /**
     * @return mixed
     */
    public function model()
    {
        return User::class;
    }
    public function __get($attribute)
    {
        return Auth::$attribute();
    }
    public function __call(string $name, array $arguments)
    {
        return Auth::$name($arguments);
    }
}
