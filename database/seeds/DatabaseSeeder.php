<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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

         App\Models\Role::create([
             'name'   => 'user'
         ]);

         App\Models\Role::create([
             'name'   => 'administrator'
         ]);

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


//        $faker = Faker::create();
//        foreach (range(1,100) as $index) {
//            \Illuminate\Support\Facades\DB::table('products')->insert([
//                'title'    => $faker->paragraph,
//                'subtitle'     =>  $faker->paragraph,
//                'product_type_id'         => $faker->numberBetween(1,4),
//                'product_sale_id'      => $faker->numberBetween(1,2),
//                'unit'         => $faker->numberBetween(21,70),
//                'product_unit_id'     => $faker->numberBetween(1,2),
//                'price'     => $faker->numberBetween(50000,1200000),
//                'project'     => $faker->word,
//                'complete'     => $faker->numberBetween(1980,2017),
//                'content'     => $faker->paragraph,
//                'province_id'     => $faker->numberBetween(1,77),
//                'seller'     => $faker->name,
//                'phone'     => $faker->phoneNumber,
//                'view'     => $faker->numberBetween(1,500),
//                'phone_view'     => $faker->numberBetween(1,500),
//                'created_at'     => $faker->dateTimeBetween('-3 years', 'now'),
//                'updated_at'     => $faker->dateTimeBetween('-3 years', 'now'),
//            ]);
//        }


    }
}
