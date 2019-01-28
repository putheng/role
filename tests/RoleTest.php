<?php

class RoleTest extends TestCase
{
	protected $lession;

	public function setUp()
	{
		parent::setUp();

		foreach(['admin', 'user', 'super'] as $role){
			\RoleStub::create([
				'name' => $role,
			]);
		}

		foreach(['edit posts', 'delete posts', 'create posts'] as $permission){
			\PermissionStub::create([
				'name' => $permission,
			]);
		}
	}

	public function test_user_has_given_role()
	{

	}
}