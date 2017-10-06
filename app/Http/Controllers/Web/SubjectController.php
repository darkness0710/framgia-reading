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
        $sorts = ['Title', 'Rate'];

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
        $subject = $this->subjectRepository->find($subject_id);
        if($request->ajax()) {
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
    }

    public function destroy($user_id, $subject_id)
    {
        $this->subjectRepository->find($subject_id)->delete();
        return redirect()->route('admin.subject', $user_id);
    }
}
