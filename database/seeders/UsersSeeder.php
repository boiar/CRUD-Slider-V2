<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $settingCheck = DB::table('users')->where('user_type', 'admin')->get();
        if (!count($settingCheck)) {
            $data = [
                [
                    'user_name'      => 'sunrise admin',
                    'user_type'      => 'admin',
                    'user_email'     => "admin@gmail.com",
                    'password'       => "$2y$10$4dLMgUaLHISN2XkXvLjFEeb1SRKCgxe9QkfEgBz9FKUfDt/nokxb6",
                    'created_at'     => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at'     => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_name'      => 'dev',
                    'user_type'      => 'admin',
                    'user_email'     => "dev@gmail.com",
                    'password'       => "$2y$10$4dLMgUaLHISN2XkXvLjFEeb1SRKCgxe9QkfEgBz9FKUfDt/nokxb6",
                    'created_at'     => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at'     => Carbon::now()->format('Y-m-d H:i:s'),
                ]

            ];

            DB::table('users')->insert($data);
        }
    }
}
