<?php
namespace App\Repositories\Eloquent;

use App\Models\Review;
use App\Models\User;
use App\Repositories\Contracts\ReviewRepositoryInterface;

class ReviewRepository extends Repository implements ReviewRepositoryInterface
{
    /**
     * @return mixed
     */
    public function model()
    {
        return Review::class;
    }

    public function getReviews($id, $with = [], $select = ['*'])
    {   
        $reviews = Review::select($select)
            ->where('reviewable_id', $id)
            ->where('reviewable_type', 'Plan')
            ->with($with)
            ->get();

        return $reviews;
    }
}
