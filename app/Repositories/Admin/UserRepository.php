<?php

namespace App\Repositories\Admin;

use App\User;
use Illuminate\Support\Facades\Hash;

class UserRepository{
    
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all(){
        return $user = $this->user->orderBy('name', 'ASC')->get();
    }

    public function findById($id){
        return $this->user->where('id', $id)->firstOrFail();
    }

    public function findByDepartment($department){
        
    }

    public function store($user){
       return $this->user->create(
           ['name' => $user['name'],
           'email' => $user['email'],
           'password' => Hash::make($user['password']),]
       );
    }

    public function update($request, $user){
        $user = $this->findById($user);
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);
        $user->syncRoles([$request['role_id']]);    
    }

    public function destroy($user){
        $user = $this->findById($user);
        $user->delete();
    }
}