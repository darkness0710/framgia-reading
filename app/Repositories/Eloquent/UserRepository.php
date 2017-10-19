<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use Auth;
use Log;
use DB;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\Relation;
use App\Models\Review;

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

    public function updateProfile($data)
    {
        try {
            $user = $this->user();
            $user->fill($data);
            $user->save();
        } catch (Exception $e) {
            Log::info($e);
        }
    }

    public function updateAvatar($avatar)
    {
        $user = $this->user();
        $avatarName = $user->id . '_' . config('app.name') . time() . '.' . $avatar->getClientOriginalExtension();

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

    public function updatePassword($password)
    {
        $user = $this->user();
        $user->password = bcrypt($password);
        $user->save();
    }

    public function getFollowers($id)
    {
        return Relation::where('following_id', $id);
    }

    public function userPlansDone($user, $paginate = 0, $withSubject = false)
    {
        $plans = $user->userPlans()->orderBy('due_date', 'desc');

        if ($withSubject) {
            $plans = $plans->with('plan.subject');
        }

        $plans = $plans->where('status', 'done');

        if ($paginate != 0) {
            $plans = $plans->paginate($paginate);
        }

        return $plans;
    }

    public function countUser($select = ['*'])
    {
        $count = User::select($select)->count();

        return $count;
    }

    public function getData($select = ['*'], $withCount = [])
    {
        $users = User::select($select)
            ->withCount($withCount)
            ->paginate(9);

        foreach($users as $user) {
            $user->reviews_count = Review::where('reviewable_id', '=', $user->id)
                ->where('reviewable_type', '=', 'Plan')->count();
        }

        return $users;
    }

    public function searchData($select = ['*'], $withCount = [], $input)
    {
        $input['title'] = preg_replace('!\s+!', ' ', $input['title']);

        if($input['title'] == null) {
            $input['title'] = "";
        }

        switch ($input['sort']) {
            case 'Name':
                $input['sort'] = 'name';
                break;
            case 'Total Plans':
                $input['sort'] = 'plans_count';
                break;
        }

        switch ($input['typeSort']) {
            case 'Up':
                $input['typeSort'] = 'ASC';
                break;
            case 'Down':
                $input['typeSort'] = 'DESC';
                break;
        }

        $users = User::select($select)
            ->whereLike('name', $input['title'])
            ->withCount($withCount)
            ->orderBy($input['sort'], $input['typeSort'])
            ->paginate(9);

        foreach($users as $user) {
            $user->reviews_count = Review::where('reviewable_id', '=', $user->id)
                ->where('reviewable_type', '=', 'Plan')->count();
        }

        return $users;
    }

    public function adminSearchData($request, $paginate)
    {
        $input = $request->all();

        if(empty($input['title'])) {
            $input['title'] = "";
        }

        $keyword = $input['title'];
        $users = User::whereLike('name', $keyword)
            ->orWhere('email', 'LIKE', '%' . $keyword . '%')
            ->orderBy('created_at', 'DESC')
            ->paginate($paginate);

        $users->appends($input);

        return $users;
    }

    public function getFollowings($id)
    {
        return Relation::where('follower_id', $id);
    }
}
