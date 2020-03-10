<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $superAdminRole = Role::create(['name' => config('constants.ROLE_TYPE_SUPERADMIN'),'guard_name'=>'web_admin']);
        
        $user = User::create(['name'=>'Super Admin',
                              'email'=>'admin@example.com',
                              'password'=>Hash::make('password')]);

        $user->assignRole($superAdminRole);


    }
}
