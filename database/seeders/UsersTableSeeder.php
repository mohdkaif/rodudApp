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
                'email' => 'mohammad.kaif@MY_comp.com',
                'mobile_number' => NULL,
                'profile_image' => NULL,
                'role' => 'admin',
                'email_verified_at' => 1,
                'password' => '$2y$10$wDRebwPyXv/PHS9ioVRFpushe8UKETWOFSGquNHCx.8tpUdPaisqe',
                'settings' => NULL,
                'two_factor_auth' => 'false',
                'remember_token' => NULL,
                'status' => 'active',
                'created_by' => 0,
                'updated_by' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array(
                'id' => 2,
                'first_name' => 'Abhijit',
                'last_name' => 'Jagtap',
                'email' => 'abhijit.jagtap@MY_comp.com',
                'mobile_number' => NULL,
                'profile_image' => NULL,
                'role' => 'admin',
                'email_verified_at' => 1,
                'password' => '$2y$10$wDRebwPyXv/PHS9ioVRFpushe8UKETWOFSGquNHCx.8tpUdPaisqe',
                'settings' => NULL,
                'two_factor_auth' => 'false',
                'remember_token' => NULL,
                'status' => 'active',
                'created_by' => 0,
                'updated_by' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array(
                'id' => 3,
                'first_name' => 'Shiva',
                'last_name' => 'kumar',
                'email' => 'shiva.kumar@MY_comp.com',
                'mobile_number' => NULL,
                'profile_image' => NULL,
                'role' => 'admin',
                'email_verified_at' => 1,
                'password' => '$2y$10$j3xB6NYrk9N//1JD40/nqOmmEJ3rgp.YYjryBxdCeo2ByW5ohqSPW',
                'settings' => NULL,
                'two_factor_auth' => 'false',
                'remember_token' => NULL,
                'status' => 'active',
                'created_by' => 0,
                'updated_by' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array(
                'id' => 4,
                'first_name' => 'Deboprio',
                'last_name' => 'Ghosh',
                'email' => 'deboprio@MY_comp.com',
                'mobile_number' => NULL,
                'profile_image' => NULL,
                'role' => 'admin',
                'email_verified_at' => 1,
                'password' => '$2y$10$TWo3DmEatWhV1hdCwrx0R.qptgntnIrwU5NfpmHLT6ia1HuY9HnPe',
                'settings' => NULL,
                'two_factor_auth' => 'false',
                'remember_token' => NULL,
                'status' => 'active',
                'created_by' => 0,
                'updated_by' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 =>
            array(
                'id' => 5,
                'first_name' => 'Akshay',
                'last_name' => 'Patel',
                'email' => 'adpatel@MY_comp.com',
                'mobile_number' => NULL,
                'profile_image' => NULL,
                'role' => 'admin',
                'email_verified_at' => 1,
                'password' => '$2y$10$rA04iS8VMavCaCO1pKH6pejFGC3dDJXbw/jPbkLV4zk5NALNNFGqW',
                'settings' => NULL,
                'two_factor_auth' => 'false',
                'remember_token' => NULL,
                'status' => 'active',
                'created_by' => 0,
                'updated_by' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 =>
            array(
                'id' => 6,
                'first_name' => 'Ravi',
                'last_name' => 'Kulkarni',
                'email' => 'ravi.kulkarni@MY_comp.com',
                'mobile_number' => NULL,
                'profile_image' => NULL,
                'role' => 'admin',
                'email_verified_at' => 1,
                'password' => '$2y$10$lR1o3ApWMTigNgUePjbvn.wzT9BJYx94xhbbkk0OEp6qFf81.KO66',
                'settings' => NULL,
                'two_factor_auth' => 'false',
                'remember_token' => 'vUrGp7u3RhP03E04zpWhv9iAG67Bzo8Xg7t1SO4AXsZaYd8HENC0o44edAl7',
                'status' => 'active',
                'created_by' => 0,
                'updated_by' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-10-19 03:24:41',
            ),
            6 =>
            array(
                'id' => 7,
                'first_name' => 'Tetsuro',
                'last_name' => 'Nagaki ',
                'email' => 'tnagaki@MY_comp.com',
                'mobile_number' => NULL,
                'profile_image' => NULL,
                'role' => 'admin',
                'email_verified_at' => 1,
                'password' => '$2y$10$CRK6VSpV5kjK7wJWq5g/uOTj7NK4mzQ3uYIpqZgCBG/FhpJAIrAgm',
                'settings' => NULL,
                'two_factor_auth' => 'false',
                'remember_token' => NULL,
                'status' => 'active',
                'created_by' => 0,
                'updated_by' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 =>
            array(
                'id' => 12,
                'first_name' => 'Sridevi',
                'last_name' => 'Krishnamurthi',
                'email' => 'sridevi.k@MY_comp.com',
                'mobile_number' => '98765432345',
                'profile_image' => NULL,
                'role' => 'admin',
                'email_verified_at' => 1,
                'password' => '$2y$10$ieXbPqTlhf6KV3Fer2v/VuUsSFW/jnz9M.lqHYDePYsnNoQfnyal6',
                'settings' => NULL,
                'two_factor_auth' => 'false',
                'remember_token' => 'RKwZPcznfQzsU4K1vTROsB7nd3uK5JVZaY6JBp0DQoFriqbfMEps9dfl2urV',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-06-18 08:56:34',
                'updated_at' => '2021-06-18 09:02:07',
            ),
            8 =>
            array(
                'id' => 13,
                'first_name' => 'Samer',
                'last_name' => 'Alzyod',
                'email' => 'samer.alzyod@MY_comp.com',
                'mobile_number' => '00000000000',
                'profile_image' => NULL,
                'role' => 'admin',
                'email_verified_at' => 0,
                'password' => '$2y$10$Cv95M4OmPJrRLFRbiEG9ZuSKDEgLRj38iddjynEK94cT1P3STMIZu',
                'settings' => NULL,
                'two_factor_auth' => 'false',
                'remember_token' => 'Q0dXzydY2zrObKWbAWyLcAIq9M93vN13kJ3irhf4kPn0EBRpICUem5yjVMfw',
                'status' => 'pending',
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-06-18 08:58:04',
                'updated_at' => '2021-06-18 08:58:04',
            ),
            9 =>
            array(
                'id' => 21,
                'first_name' => 'Michael',
                'last_name' => 'Koene',
                'email' => 'michael.koene@MY_comp.com',
                'mobile_number' => NULL,
                'profile_image' => NULL,
                'role' => 'admin',
                'email_verified_at' => 1,
                'password' => '$2y$10$rhaFMXXCKLoo0fwrVU0zWuzogEoRPY5I0IDxOfNpI7VUV3F1nHM3a',
                'settings' => NULL,
                'two_factor_auth' => 'false',
                'remember_token' => 'n50CYrZr2Pzz2bNpMmdjadnfAyHmypTIRzYjXxbPREiOPcetEYvNjRn29Jd6',
                'status' => 'active',
                'created_by' => 3,
                'updated_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2021-07-14 07:51:42',
                'updated_at' => '2021-07-14 07:54:32',
            ),
            10 =>
            array(
                'id' => 27,
                'first_name' => 'Anupama',
                'last_name' => 'a',
                'email' => 'anupama.a@MY_comp.com',
                'mobile_number' => NULL,
                'profile_image' => 'assets/uploads/profile_image/console...jpg',
                'role' => 'admin',
                'email_verified_at' => 1,
                'password' => '$2y$10$UIeTCDQXe/kNI3G.UkxceulsF2aCX5sqSoHYB.fnowgzZ9/fV5OUa',
                'settings' => NULL,
                'two_factor_auth' => 'false',
                'remember_token' => 'xetxAoE4AJ8IU68GlZefk2TBmTx40CKRCrHWcxOpzo8vEO2inEKS5xQBDroD',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => 27,
                'deleted_at' => NULL,
                'created_at' => '2021-09-01 10:11:52',
                'updated_at' => '2022-04-19 15:53:49',
            ),
            11 =>
            array(
                'id' => 28,
                'first_name' => 'Nagashree',
                'last_name' => 'NR',
                'email' => 'nagashree.nr@MY_comp.com',
                'mobile_number' => NULL,
                'profile_image' => NULL,
                'role' => 'admin',
                'email_verified_at' => 1,
                'password' => '$2y$10$qnw5NRJXlwNnbAAbZuQCy.zD7ZKKKGSXX1vHAkBKvMJXBmgdO7Mxm',
                'settings' => NULL,
                'two_factor_auth' => 'false',
                'remember_token' => 'fxVZUoF29t01vBbuEPJ16DpAYksulQcUx6MMwoBn1f0gPYBt87VTGsp7mP0r',
                'status' => 'active',
                'created_by' => 27,
                'updated_by' => 28,
                'deleted_at' => NULL,
                'created_at' => '2022-04-14 21:34:27',
                'updated_at' => '2022-04-19 16:00:36',
            ),
            12 =>
            array(
                'id' => 29,
                'first_name' => 'MY_comp',
                'last_name' => '',
                'email' => 'demo@gmail.com',
                'mobile_number' => '(+12) 3456-7890-22',
                'profile_image' => NULL,
                'role' => 'console_admin',
                'email_verified_at' => 0,
                'password' => '$2y$10$D4kNh2fFFuXa7od1nsII/.CEQM9CnhMKPb7yQPYKihGLgmIzKwyyC',
                'settings' => NULL,
                'two_factor_auth' => 'false',
                'remember_token' => '8B4Mtz1983MEd5nF27XBd9CoZxWnYTbv6fr4BgtlDrP7S5w2vuUClweaAhRz',
                'status' => 'pending',
                'created_by' => 28,
                'updated_by' => 28,
                'deleted_at' => NULL,
                'created_at' => '2022-04-14 21:36:52',
                'updated_at' => '2022-04-14 21:36:52',
            ),
            13 =>
            array(
                'id' => 30,
                'first_name' => 'Raj',
                'last_name' => 'Roushan',
                'email' => 'roushan.k@MY_comp.com',
                'mobile_number' => NULL,
                'profile_image' => NULL,
                'role' => 'admin',
                'email_verified_at' => 1,
                'password' => '$2y$10$g6YrGnDUA9GVPXwmneCjFuK6yfQByAiVzHri418ktDaJH5U8TfZC6',
                'settings' => NULL,
                'two_factor_auth' => 'false',
                'remember_token' => NULL,
                'status' => 'active',
                'created_by' => 0,
                'updated_by' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 =>
            array(
                'id' => 31,
                'first_name' => 'Raam',
                'last_name' => 'Kumar',
                'email' => 'raam.kumar@MY_comp.com',
                'mobile_number' => NULL,
                'profile_image' => NULL,
                'role' => 'admin',
                'email_verified_at' => 1,
                'password' => '$2y$10$g6YrGnDUA9GVPXwmneCjFuK6yfQByAiVzHri418ktDaJH5U8TfZC6',
                'settings' => NULL,
                'two_factor_auth' => 'false',
                'remember_token' => NULL,
                'status' => 'active',
                'created_by' => 0,
                'updated_by' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 =>
            array(
                'id' => 32,
                'first_name' => 'Vyoma',
                'last_name' => 'Maroo',
                'email' => 'vyoma.maroo@MY_comp.com',
                'mobile_number' => NULL,
                'profile_image' => NULL,
                'role' => 'admin',
                'email_verified_at' => 1,
                'password' => '$2y$10$g6YrGnDUA9GVPXwmneCjFuK6yfQByAiVzHri418ktDaJH5U8TfZC6',
                'settings' => NULL,
                'two_factor_auth' => 'false',
                'remember_token' => NULL,
                'status' => 'active',
                'created_by' => 0,
                'updated_by' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),

            16 =>
            array(
                'id' => 33,
                'first_name' => 'Kumara',
                'last_name' => 'Guru',
                'email' => 'kumara.guru@MY_comp.com',
                'mobile_number' => NULL,
                'profile_image' => NULL,
                'role' => 'admin',
                'email_verified_at' => 1,
                'password' => '$2y$10$g6YrGnDUA9GVPXwmneCjFuK6yfQByAiVzHri418ktDaJH5U8TfZC6',
                'settings' => NULL,
                'two_factor_auth' => 'false',
                'remember_token' => NULL,
                'status' => 'active',
                'created_by' => 0,
                'updated_by' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
             17 =>
            array(
                'id' => 34,
                'first_name' => 'Bhakti',
                'last_name' => 'Kulkarni',
                'email' => 'bhakti.g@MY_comp.com',
                'mobile_number' => NULL,
                'profile_image' => NULL,
                'role' => 'admin',
                'email_verified_at' => 1,
                'password' => '$2y$10$g6YrGnDUA9GVPXwmneCjFuK6yfQByAiVzHri418ktDaJH5U8TfZC6',
                'settings' => NULL,
                'two_factor_auth' => 'false',
                'remember_token' => NULL,
                'status' => 'active',
                'created_by' => 0,
                'updated_by' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            
            18 =>
            array(
                'id' => 35,
                'first_name' => 'Praveen',
                'last_name' => 'Kumar',
                'email' => 'praveenkumar.p@MY_comp.com',
                'mobile_number' => NULL,
                'profile_image' => NULL,
                'role' => 'admin',
                'email_verified_at' => 1,
                'password' => '$2y$10$g6YrGnDUA9GVPXwmneCjFuK6yfQByAiVzHri418ktDaJH5U8TfZC6',
                'settings' => NULL,
                'two_factor_auth' => 'false',
                'remember_token' => NULL,
                'status' => 'active',
                'created_by' => 0,
                'updated_by' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 =>
            array(
                'id' => 36,
                'first_name' => 'Pratyush',
                'last_name' => 'Banar',
                'email' => 'pratyush.banad@MY_comp.com',
                'mobile_number' => NULL,
                'profile_image' => NULL,
                'role' => 'admin',
                'email_verified_at' => 1,
                'password' => '$2y$10$g6YrGnDUA9GVPXwmneCjFuK6yfQByAiVzHri418ktDaJH5U8TfZC6',
                'settings' => NULL,
                'two_factor_auth' => 'false',
                'remember_token' => NULL,
                'status' => 'active',
                'created_by' => 0,
                'updated_by' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 =>
            array(
                'id' => 37,
                'first_name' => 'Yashwanth',
                'last_name' => 'Padarthi',
                'email' => 'yashwanth.padarthi@MY_comp.com',
                'mobile_number' => NULL,
                'profile_image' => NULL,
                'role' => 'admin',
                'email_verified_at' => 1,
                'password' => '$2y$10$g6YrGnDUA9GVPXwmneCjFuK6yfQByAiVzHri418ktDaJH5U8TfZC6',
                'settings' => NULL,
                'two_factor_auth' => 'false',
                'remember_token' => NULL,
                'status' => 'active',
                'created_by' => 0,
                'updated_by' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),  21 =>
            array(
                'id' => 38,
                'first_name' => 'P',
                'last_name' => 'Shiva',
                'email' => 'shiva.p@MY_comp.com',
                'mobile_number' => NULL,
                'profile_image' => NULL,
                'role' => 'admin',
                'email_verified_at' => 1,
                'password' => '$2y$10$g6YrGnDUA9GVPXwmneCjFuK6yfQByAiVzHri418ktDaJH5U8TfZC6',
                'settings' => NULL,
                'two_factor_auth' => 'false',
                'remember_token' => NULL,
                'status' => 'active',
                'created_by' => 0,
                'updated_by' => 0,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            )
        ));
    }
}
