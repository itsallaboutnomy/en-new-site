<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Super Admin
        $user = User::create([
            'id' => 1,
            'name' => 'Super Admin',
            'email' => 'superadmin@enablers.org',
            'type' => User::$userType['adminGenerated'],
            'password' => bcrypt('123456'),
            'created_by' => 1
        ]);
        $role = Role::findById(1);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

//      Admin
        $user = User::create([
            'id' => 2,
            'name' => 'Admin User',
            'email' => 'admin@enablers.org',
            'type' => User::$userType['adminGenerated'],
            'password' => bcrypt('admin'),
            'created_by' => 1
        ]);

        $role = Role::whereName('Admin')->first();
        $user->assignRole([$role->id]);

//      Support
        $user = User::create([
            'id' => 3,
            'name' => 'Support User',
            'email' => 'support@enablers.org',
            'type' => User::$userType['adminGenerated'],
            'password' => bcrypt('support'),
            'created_by' => 1
        ]);

        $role = Role::whereName('Support')->first();
        $user->assignRole([$role->id]);

//      Accounts
        $user = User::create([
            'id' => 4,
            'name' => 'Accounts User',
            'email' => 'accounts@enablers.org',
            'type' => User::$userType['adminGenerated'],
            'password' => bcrypt('accounts'),
            'created_by' => 1
        ]);

        $role = Role::whereName('Accounts')->first();
        $user->assignRole([$role->id]);
    }

}
