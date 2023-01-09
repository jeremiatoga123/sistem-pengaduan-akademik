<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('name', 'Root')->first();

        if ($user) {
            $role = Role::where('name', 'Admin')->first();
        } else {
            $user = new User();
            $user->name = 'Root';
            $user->username = 'root';
            $user->email = 'root@root.com';
            $user->password = Hash::make('root');
            $user->save();
    
            $role = Role::create(['name' => 'Admin']);
        }

        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
        
    }
}
