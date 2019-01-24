Installation
------------

Require this package with composer. It is recommended to only require the package for development.
```
composer require putheng/role
```

Laravel 5.5 uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.

### Setting up from scratch

#### Laravel 5.5+:
If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php
```php
Putheng\Role\RoleServiceProvider::class,
```

#### The schema
For Laravel 5 migration
```php
php artisan migrate
```
#### The model
Your model should use `Putheng\Role\Traits\HasPermissionsTrait` trait to User model:
```php
use Putheng\Role\Traits\HasPermissionsTrait;

class User extends Model {
    use HasPermissionsTrait;
}
```

## Usage

Check is user has roles
```php
$user = User::find(1);

// multiple argument
$user->hasRole('admin', 'user');
// true or false 
```

Check is user has permission or permission through role
```php
$user = User::find(1);

$user->hasPermissionTo('edit posts', 'delete posts');
// true or false 
```

Give permissions
```php
$user = User::find(1);

$user->givePermissionTo(['edit posts', 'delete posts']);
```

Revoke permissions
```php
$user = User::find(1);

$user->withdrawPermissionTo(['edit posts']);
```

Refresh permissions
remove all user's permissions and re-give the permissions 
```php
$user = User::find(1);

$user->refreshPermissions(['edit posts']);
```

Custom blade what we output inside template
```php
@role('admin')
    <a href="#">Admin panel</a>
@endrole
```