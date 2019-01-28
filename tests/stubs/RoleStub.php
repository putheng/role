<?php

use Putheng\Role\Models\Permission;
use Illuminate\Database\Eloquent\Model;

class RoleStub extends Model
{
    protected $connection = 'testbench';

    protected $table = 'roles';

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }
}
