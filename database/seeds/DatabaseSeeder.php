<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        //DB::table('roles')->delete();

        // App\Models\Role::create([
        //     'name'   => 'user'
        // ]);

        // App\Models\Role::create([
        //     'name'   => 'administrator'
        // ]);

        $adminRole = \App\Models\Role::whereName('administrator')->first();
        $userRole = \App\Models\Role::whereName('user')->first();

        $user = \App\Models\User::create(array(
            'first_name'    => 'John',
            'last_name'     => 'Doe',
            'email'         => 'j.doe@codingo.me',
            'password'      => Hash::make('password'),
            'token'         => str_random(64),
            'activated'     => true
        ));
        $user->assignRole($adminRole);

        $user = \App\Models\User::create(array(
            'first_name'    => 'Jane',
            'last_name'     => 'Doe',
            'email'         => 'jane.doe@codingo.me',
            'password'      => Hash::make('janesPassword'),
            'token'         => str_random(64),
            'activated'     => true
        ));
        $user->assignRole($userRole);





    }
}
