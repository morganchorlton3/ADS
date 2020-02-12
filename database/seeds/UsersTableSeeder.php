<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        //roles
        $adminUser = Role::where('name', 'admin')->first();
        $user = Role::where('name', 'user')->first();

        //user
        $admin1 = User::create([
            'title' => 'Mr',
            'first_name' => 'Morgan',
            'last_name' => 'Chorlton',
            'phone_number' => '07760306029',
            'email' => 'morganchorlton3@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('adminpass')
        ]);
        //atach roles
        $admin1->roles()->attach($adminUser);


        $faker = Faker\Factory::create();

        for($i = 0; $i < 100; $i++) {
            App\User::create([
                'title' => $faker->title,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone_number' => $faker->phoneNumber,
                'email' => $faker->email,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('adminpass')
            ]);
        }
       
    }
}
