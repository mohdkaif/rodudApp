<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {




        \DB::table('users')->delete();

        \DB::table('users')->insert(array(
            0 =>
            array(
                'id' => 1,
                'first_name' => 'Mohd',
                'last_name' => 'Kaif',
                'email' => 'mohdkaif984@gmail.com',
                'mobile_number' => NULL,
                'profile_image' => NULL,
                'role' => 'admin',
                'email_verified_at' => 1,
                'password' => '$2y$10$Jrx9OZJ4tcmb0.4uRqVr9.EhhUUVn2mP2b5yBv5DMqcP0k1tevhX6',
                'two_factor_auth' => 'false',
                'remember_token' => NULL,
                'status' => 'active',
                'created_by' => 0,
                'updated_by' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
           
        ));
    }
}
