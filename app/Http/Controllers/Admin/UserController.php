<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreatorRequest;

class UserController extends Controller
{

    private $userRepository;
    private $userPlanItemRepository;
    private $userPlanRepository;

    public function __construct(
        UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreatorRequest $request)
    {
        $data = $request->except('_token', 'password_confirmation');
        $avatar = config('custom.avatar.default');
        if (array_has($data, 'avatar')) {
            $avatarFile = $data['avatar'];
            $avatar = $data['email'] . '.' . config('app.name') . '.' . $avatarFile->getClientOriginalExtension();
            upload_file($avatarFile, config('custom.avatar.url'), $avatar);
        }

        $user = $this->userRepository->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'avatar' => $avatar,
            'role' => 'member'
        ]);

        return response()->json([
            'user' => $user,
            'messages' => trans('messages.user_created_success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
