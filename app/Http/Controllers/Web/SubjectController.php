<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\SubjectRepositoryInterface as SubjectRepository;
use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;
use App\Models\Subject;

class SubjectController extends Controller
{
    private $subjectRepository;
    private $userRepository;

    public function __construct(
        SubjectRepository $subjectRepository,
        UserRepository $userRepository
    ) {
        $this->subjectRepository = $subjectRepository;
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $sorts = ['Number of Plans', 'Hot'];
        $subjects = $this->subjectRepository->paginate(9);
        $count_subjects = $subjects->count();

        return view('subject.index', compact('subjects', 'count_subjects', 'sorts'));
    }

    public function show($id)
    {
        $subject = Subject::find($id);

        return view('subject.show', compact($subject));
    }

    public function indexDashboard(Request $request)
    {
        $user = $this->userRepository->user();
        $subjects = $this->subjectRepository->paginate(10);

        if($request->ajax()) {
           $html = view('admins.subjects._table', compact('user', 'subjects'))->render();

           return Response(['html' => $html]);
        }

        return view('admins.subjects.index', compact('user', 'subjects'));
    }

    public function getAllSubjectByFilter()
    {   
        $subjects = Subject::select('title')->get();

        return $subjects->toArray();
    }

    public function getAllSortByFilter()
    {   
        $sorts = ['Name', 'Rate'];

        return $sorts;
    }

    public function getData(Request $request, $id, $subject_id)
    {   
        if($request->ajax()) {
            $subject = $this->subjectRepository->find($subject_id);

            return response($subject);
        }
    }

    public function update(Request $request, $user_id, $subject_id)
    {
        if(!$request->ajax()) {
            return fasle;
        }

        $subject = $this->subjectRepository->find($subject_id);

        if($request->hasFile('file')) {
            $subjectImageName = $request->file->getClientOriginalName();
            $subjectImageName = $subject_id . '_' . $subjectImageName;
            $request->file->move(public_path('uploads/subjects'), $subjectImageName);
            $subject->cover = $subjectImageName;
        }
            
        $subject->title = $request->title;
        $subject->description = $request->description;
        $subject->trending = $request->trending;
        $subject->save();
    }

    public function destroy($user_id, $subject_id)
    {
        $this->subjectRepository->find($subject_id)->delete();

        return redirect()->route('admin.subject', $user_id);
    }

    public function store(Request $request, $user_id)
    {
        if(!$request->ajax()) {
            return fasle;
        }

        $this->subjectRepository->createSubjectByAjax($request);
    }
}
