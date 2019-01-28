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

#### Add to `AppServiceProvider` on `boot` method for Bootstrap services.
```php
use Putheng\Role\Models\Permission;

Permission::get()->map(function($permission){
    Gate::define($permission->name, function($user) use ($permission){
        return $user->hasPermissionTo($permission);
    });
});
```

## Usage

Check is user has roles
```php
$user = User::find(1);

// multiple argument
$user->hasRole('admin', 'user');
// true or false 
```

Give role to
```php
$user = User::find(1);

// multiple argument
$user->giveRoleTo('admin', 'user');
// true or false 
```

Refresh role
```php
$user = User::find(1);

// multiple argument
$user->refreshRoles('admin', 'user');
// true or false 
```

Check is user has permission or permission through role
```php
$user = User::find(1);

$user->hasPermissionTo('edit posts', 'delete posts');
// true or false 

// Use Laravel Gate can method
$user->can('edit posts');
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
Role
```html
@role('admin')
    <a href="#">Admin panel</a>
@endrole
```

Permission
```html
@permission('edit post')
    <a href="#">Edit post</a>
@endpermission
```