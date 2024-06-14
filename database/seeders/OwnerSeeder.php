<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owners')->insert([
            [
                'name' => 'test1',
                'email' => 'test1@sample.com',
                'password' => Hash::make('password1234'),
                'created_at' => '2024/06/10 11:50:00'
            ],
            [
                'name' => 'test2',
                'email' => 'test2@sample.com',
                'password' => Hash::make('password1234'),
                'created_at' => '2024/06/10 11:50:00'
            ],
            [
                'name' => 'test3',
                'email' => 'test3@sample.com',
                'password' => Hash::make('password1234'),
                'created_at' => '2024/06/10 11:50:00'
            ],
            [
                'name' => 'test4',
                'email' => 'test4@sample.com',
                'password' => Hash::make('password1234'),
                'created_at' => '2024/06/10 11:50:00'
            ],
            [
                'name' => 'test5',
                'email' => 'test5@sample.com',
                'password' => Hash::make('password1234'),
                'created_at' => '2024/06/10 11:50:00'
            ],
            [
                'name' => 'test6',
                'email' => 'test6@sample.com',
                'password' => Hash::make('password1234'),
                'created_at' => '2024/06/10 11:50:00'
            ],
        ]);
    }
}
