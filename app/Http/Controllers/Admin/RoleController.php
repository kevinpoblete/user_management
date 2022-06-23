<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Repositories\Admin\DepartmentRepository;
use App\Repositories\Admin\RoleRepository;

class RoleController extends Controller
{
    private $roleRepository;
    private $departmentRepository;
    
    public function __construct(RoleRepository $roleRepository, DepartmentRepository $departmentRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->departmentRepository = $departmentRepository;
    }
    
    public function index(){
        $roles = $this->roleRepository->all();
        return view('admin.roles.index', compact('roles'));
    }

    public function show($role){
        $role = $this->roleRepository->findById($role);
        dd($role);
    }

    public function create(){
        $departments = $this->departmentRepository->all();
        return view('admin.roles.create', compact('departments'));
    }

    public function store(RoleRequest $request){
        $role = $request->validated();
        
        $role = $this->roleRepository->store($role);
        return redirect(route('admin.role.index'));
    }

    public function edit($role){
        $role = $this->roleRepository->findById($role);
        return view('admin.roles.edit', compact('role'));
    }

    public function update(RoleRequest $request, $role){
        $request = $request->validated();
        $role = $this->roleRepository->update($request, $role);
        return redirect(route('admin.role.index'));

    }

    public function destroy($role){
        $this->roleRepository->destroy($role);
        return redirect()->back();
    }

    
}
