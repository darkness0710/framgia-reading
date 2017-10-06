<?php
namespace App\Repositories\Eloquent;

use App\Models\PlanItem;
use App\Repositories\Contracts\PlanItemRepositoryInterface;

class PlanItemRepository extends Repository implements PlanItemRepositoryInterface
{
    /**
     * @return mixed
     */
    public function model()
    {
        return PlanItem::class;
    }
}