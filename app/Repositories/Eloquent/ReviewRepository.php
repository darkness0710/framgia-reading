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

    public function getAverage($id, $type)
    {
        $reviews = Review::where('reviewable_type', 'LIKE', '%' . $type . '%')
            ->where('reviewable_id', $id)->get();
        $sum = 0;
        
        if ($reviews->count() == 0) {
            return 0;
        }

        foreach($reviews as $review) {
            $sum += $review->rate;
        }

        $result = $sum / $reviews->count();

        if ($result - floor($result) <= 0.5) {
            $result = floor($result) + 0.5;
        } else {
            $result = floor($result) + 1;
        }

        return $result < 5 ? $result : 5;
    }

    public function setReview($data, $id, $type)
    {
        $userReview = Review::where('reviewable_type', 'LIKE', '%' . $type .'%')
            ->where('user_id', $data['user_id'])
            ->where('reviewable_id', $id)->get();
        $review = null;
        if($userReview->count() == 0) {
            $review = $this->reviewRepository->create([
                'user_id' => $data['user_id'],
                'reviewable_id' => $id,
                'reviewable_type' => $type,
                'rate' => $data['rate'],
                'content' => $data['comment'],
            ]);
        } else {
            $review = $userReview->first();
            $review->rate = $data['rate'];
            $review->content = $data['comment'];
            $review->save();
        }

        return $this->getAverage($id, $type);
    }
    public function getReviewNumber($id, $type)
    {
        return Review::where('reviewable_type', 'LIKE', '%' . $type . '%')
            ->where('reviewable_id', $id)->count();
    }
}
