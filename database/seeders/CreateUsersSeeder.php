<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin Wissem',
                'email' => 'wissem@esmc.com',
                'type' => 1,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Admin Saif',
                'email' => 'saif@esmc.com',
                'type' => 1,
                'password' => bcrypt('123456'),
            ],

            [
                'name' => 'User',
                'email' => 'user@esmc.com',
                'type' => 0,
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
