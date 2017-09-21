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

    public function getSubjectByTrending()
    {
        $subjects = Subject::withCount('plans')
            ->orderBy('trending', 'desc')
            ->limit(6)
            ->get();

        return $subjects;
    }
}
