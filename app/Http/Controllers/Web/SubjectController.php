<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\SubjectRepositoryInterface as SubjectRepository;
use App\Models\Subject;

class SubjectController extends Controller
{
    private $subjectRepository;

    public function __construct(SubjectRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    public function getAllSubjectByFilter()
    {   
        $subjects = Subject::select('title')->get();

        return $subjects->toArray();
    }

    public function getAllSortByFilter()
    {   
        $sorts = ['Title', 'Rate'];

        return $sorts;
    }
}
