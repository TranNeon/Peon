<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\Attributes\Seed;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

    class SpatieRolePermissionSeed extends Seeder
{
    /**
     * Create the initial roles and permissions.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'review post_request']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'reviewer']);
        $role1->givePermissionTo('review post_request');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('review post_request');


        $role2 = Role::create(['name' => 'user']);

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider
    }
}

