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
        //Super admin
        $user = User::create([
        	'name' => 'Super Admin', 
        	'email' => 'superadmin@emadema.com',
        	'password' => bcrypt('000000')
        ]);
        $role = Role::create(['name' => 'Super Admin']);     
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
        //End superadmin

        //admin wallet
        $role = Role::create(['name' => 'Admin wallet']);
        $user = User::create([
        	'name' => 'Utente', 
        	'email' => 'adminwallet@emadema.com',
        	'password' => bcrypt('000000')
        ]);
        $user->assignRole([$role->id]);
        //end admin wallet

        //user
        $role = Role::create(['name' => 'user']);
        $user = User::create([
        	'name' => 'User', 
        	'email' => 'user@emadema.com',
        	'password' => bcrypt('000000')
        ]);
        $user->assignRole([$role->id]);
        //end user
    }
}
