<?php

use Putheng\Role\Models\Role;
use Illuminate\Database\Eloquent\Model;

class PermissionStub extends Model
{
    protected $connection = 'testbench';

    protected $table = 'permissions';

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_permissions');
    }
}
