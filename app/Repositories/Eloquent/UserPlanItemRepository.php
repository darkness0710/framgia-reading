<?php
namespace App\Repositories\Eloquent;

use App\Models\UserPlanItem;
use App\Repositories\Contracts\UserPlanItemRepositoryInterface;

class UserPlanItemRepository extends Repository implements UserPlanItemRepositoryInterface
{
    /**
     * @return mixed
     */
    public function model()
    {
        return UserPlanItem::class;
    }
}
