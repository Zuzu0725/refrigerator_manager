<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'テスト1',
                'email' => 'test1@test.com',
                'password' => '$2y$10$uGUGFEZsizfrWHE02a6MGuiO0HQUhy.exHlkQOPKfkizs0UarkTG6',
            ],
            [
                'id' => 2,
                'name' => 'テスト2',
                'email' => 'test2@test.com',
                'password' => '$2y$10$uGUGFEZsizfrWHE02a6MGuiO0HQUhy.exHlkQOPKfkizs0UarkTG6',
            ],
            [
                'id' => 3,
                'name' => 'テスト3',
                'email' => 'test3@test.com',
                'password' => '$2y$10$uGUGFEZsizfrWHE02a6MGuiO0HQUhy.exHlkQOPKfkizs0UarkTG6',
            ],
        ]);
    }
}
