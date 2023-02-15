<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MymySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mymys')->insert([
            [
                'name' => 'test1',
                'email' => 'test1@test',
                'password' => Hash::make('password123'), //パスワードを暗号化
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'test2',
                'email' => 'test2@test',
                'password' => Hash::make('password123'), //パスワードを暗号化
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'test3',
                'email' => 'test3@test',
                'password' => Hash::make('password123'), //パスワードを暗号化
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'test4',
                'email' => 'test4@test',
                'password' => Hash::make('password123'), //パスワードを暗号化
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'test5',
                'email' => 'test5@test',
                'password' => Hash::make('password123'), //パスワードを暗号化
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'test6',
                'email' => 'test6@test',
                'password' => Hash::make('password123'), //パスワードを暗号化
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'test7',
                'email' => 'test7@test',
                'password' => Hash::make('password123'), //パスワードを暗号化
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'test8',
                'email' => 'test8@test',
                'password' => Hash::make('password123'), //パスワードを暗号化
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'test9',
                'email' => 'test9@test',
                'password' => Hash::make('password123'), //パスワードを暗号化
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'test10',
                'email' => 'test10@test',
                'password' => Hash::make('password123'), //パスワードを暗号化
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'test11',
                'email' => 'test11@test',
                'password' => Hash::make('password123'), //パスワードを暗号化
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => '藤木',
                'email' => 'mymy@mymy',
                'password' => Hash::make('mymymymy'), //パスワードを暗号化
                'created_at' => '2021/01/01 11:11:11'
            ],
        ]);
    }
}
