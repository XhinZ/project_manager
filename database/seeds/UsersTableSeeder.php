<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'  =>  'Tushar V Bharadwaj',
            'email' =>  'tushurules@gmail.com',
            'password'  =>  bcrypt('123456')
        ]);
        $role = Role::findOrFail(1);
        $user->attachRole($role);
    }
}
