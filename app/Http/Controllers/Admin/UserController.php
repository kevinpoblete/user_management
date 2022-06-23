<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Admin\UserRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Repositories\Admin\RoleRepository;
use Illuminate\Http\Request;


class UserController extends Controller
{
    private $userRepository, $roleRepository;
    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index(){
        $users = $this->userRepository->all();
        
        return view('admin.users.index', compact('users'));
        
    }

    public function show($user){
        $user = $this->userRepository->findById($user);
        dd($user);
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(UserRequest $request){
        $user = $request->validated();
        $user = $this->userRepository->store($user);
        return redirect(route('admin.user.index'));
    }

    public function edit($user){
        $user = $this->userRepository->findById($user);
        $roles = $this->roleRepository->all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $user){
        
        $user = $this->userRepository->update($request, $user);
        return redirect(route('admin.user.index'));

    }

    public function destroy($user){
        $this->userRepository->destroy($user);
        return redirect()->back();
    }


}
