<?php

use Putheng\Role\RoleServiceProvider;
use Orchestra\Database\ConsoleServiceProvider;

abstract class TestCase extends Orchestra\Testbench\TestCase
{
	protected function getPackageProviders($app)
	{
		return [
			RoleServiceProvider::class
		];
	}

	public function setup()
	{
		parent::setUp();

		Eloquent::unguard();

		$this->artisan('migrate', [
			'--database' => 'testbench',
			'--realpath' => realpath(__DIR__ . '/../migrations'),
		]);
	}

	public function teardown()
	{
	}

	protected function getEnvironmentSetup($app)
	{
		$app['config']->set('database.default', 'testbench');

		$app['config']->set('database.connections.testbench', [
			'driver' => 'sqlite',
			'database' => ':memory:',
			'prefix' => '',
		]);

		\Schema::create('users', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
	}
}