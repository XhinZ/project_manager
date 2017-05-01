<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'owner',
            'display_name'  =>  'Owner',
            'description'   =>  'Owner of the system.'
        ]);
    }
}
