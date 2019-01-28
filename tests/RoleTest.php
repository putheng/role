<?php

class RoleTest extends TestCase
{
	protected $user;

	public function setUp()
	{
		parent::setUp();

		foreach(['admin', 'user', 'super'] as $role){
			\RoleStub::create([
				'name' => $role,
			]);
		}

		$this->user = \UserStub::create([
	        'name' => 'Putheng',
	        'email' => 'puthengemail@gmail.com',
	        'email_verified_at' => now(),
	        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
	        'remember_token' => str_random(10),
		]);
	}

	public function test_user_has_role()
	{
		$user = $this->user->giveRoleTo('admin', 'user');

		$this->assertTrue($user->hasRole('user'));
	}

	public function test_user_has_refresh_role()
	{
		$user = $this->user->giveRoleTo('admin', 'user');

		$user->refreshRoles('admin', 'super');

		$this->assertTrue($user->hasRole('super'));
	}
}