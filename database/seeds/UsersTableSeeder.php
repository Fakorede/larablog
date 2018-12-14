<?php

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
        // reset the users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        // generate users
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'johndoe@test.com',
                'password' => bcrypt('secret')
            ],
            [
                'name' => 'Jane Dorris',
                'email' => 'janedorris@test.com',
                'password' => bcrypt('secret')
            ],
            [
                'name' => 'Fakorede Abiola',
                'email' => 'sayhi@thefabdev.com',
                'password' => bcrypt('secret')
            ]
        ]);
    }
}
