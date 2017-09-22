<?php
namespace App\Repositories\Eloquent;

use App\Models\Subject;
use App\Repositories\Contracts\SubjectRepositoryInterface;
use DB;

class SubjectRepository extends Repository implements SubjectRepositoryInterface
{
    /**
     * @return mixed
     */
    public function model()
    {
        return Subject::class;
    }

    public function getSubjectByTrending($select = ['*'], $withCount = [], $limit)
    {

        $subjects = Subject::select($select)
            ->withCount($withCount)
            ->orderBy('trending', 'desc')
            ->limit($limit)
            ->get();

        return $subjects;
    }
}
