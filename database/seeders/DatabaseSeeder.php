<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\exercises;

use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'test-user',
                'email' => 'test-user@test.com',
                'password' => bcrypt('test')
            ],
        ]);

        DB::table('roles')->insert([
            [
                'name' => 'Administrator'
            ],
        ]);

        DB::table('user_role')->insert([
            [
                'user_id' => 1,
                'role_id' => 1,
            ]
        ]);

        DB::table('user_weights')->insert([
            [
                'user_id' => 1,
                'weights' => 50,
                'bmi' => 20
            ]
        ]);

        DB::table('personal_informations')->insert([
            [
                'user_id' => 1,
                'weight_id' => 1,
                'age' => 18,
                'length' => 183
            ]
        ]);
    }
}
