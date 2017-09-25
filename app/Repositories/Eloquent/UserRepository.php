<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use Auth;
use Log;
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

    public function getUserByPlan($id, $with = [], $select = ['*'], $withCount = [])
    {
        $user = User::find($id)
            ->select($select)
            ->withCount($withCount)
            ->first();

        return $user;
    }

    public function updateProfile($id, $data)
    {
        try {
            $user = $this->find($id);
            $user->fill($data);
            $user->save();
        } catch (Exception $e) {
            Log::info($e);
        }
    }

    public function updateAvatar($id, $avatar)
    {
        $user = $this->find($id);
        $avatarName = $id . '_' . config('app.name') . time() . '.' . $avatar->getClientOriginalExtension();

        $avatarPath = public_path(config('custom.avatar.url'));
        upload_file($avatar, $avatarPath, $avatarName);
        $oldAvatar = $user->avatar;

        if (file_exists($oldAvatar) &&
            $this->model->isLocalAvatar($oldAvatar)) {
            unlink(public_path(config('custom.avatar.url')) . $oldAvatar);
        }

        $user->avatar = $avatarName;
        $user->save();
        return true;
    }
}
