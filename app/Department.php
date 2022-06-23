<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Department extends Model
{
    protected $guarded = [];

    public function roles(){
        return $this->hasMany(Role::class);
    }
}
