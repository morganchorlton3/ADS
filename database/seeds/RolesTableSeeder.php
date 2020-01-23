<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        //Admin Role
        Role::create([
            'name' => 'admin'
        ]);
        //Store Manager Role
        Role::create([
            'name' => 'store-manager'
        ]);
        //Manager Role
        Role::create([
            'name' => 'manager'
        ]);
        //user Role
        Role::create([
            'name' => 'user'
        ]);
    }
}
