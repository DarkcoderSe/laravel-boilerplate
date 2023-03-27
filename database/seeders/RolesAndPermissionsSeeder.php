<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Role::create(['name' => 'Admin'])->givePermissionTo(Permission::all());
        $role = Role::where('name', 'Admin')->first();
        $user = User::where(['email' => 'admin@admin.com', 'name' => 'Admin'])->first();
        $user->assignRole($role);

    }
}
