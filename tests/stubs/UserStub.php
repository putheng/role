<?php

use Putheng\Role\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Putheng\Role\Traits\HasPermissionsTrait;

class UserStub extends Model
{
	use HasPermissionsTrait;
	
    protected $connection = 'testbench';

    protected $table = 'users';

}
