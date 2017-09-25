<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'dob',
        'avatar',
        'phone',
        'address',
        'gender',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function relations()
    {
        return $this->hasMany(Relation::class);
    }

    public function socialAccounts()
    {
        return $this->hasMany(SocialAccount::class);
    }

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }

    public function userPlans()
    {
        return $this->hasMany(UserPlan::class);
    }

    public function userPlanItems()
    {
        return $this->hasMany(UserPlanItem::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function comments()
    {
        return $this->hasManyThrough(Comment::class, Review::class);
    }

    public function getAvatar($id)
    {
        $user = User::find($id)->first();
        $avatarName = $user->avatar;
        if (!$this->isLocalAvatar($avatarName)) {
            return $avatarName;
        }

        return asset(config('custom.avatar.url') . $avatarName);
    }

    public function isLocalAvatar($name)
    {
        return strpos($name, config('app.name')) !== false;
    }
}
