<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Define roles and permissions
        $adminRole = Role::create(['name' => 'admin']);
        $packerRole = Role::create(['name' => 'packer']);

        $managePackagesPermission = Permission::create(['name' => 'manage packages']);
        $readPackagaespermission = Permission::create(['name' => 'read packages']);

        $adminRole->givePermissionTo([$managePackagesPermission]);
        $packerRole->givePermissionTo([$readPackagaespermission]);
    }
}
