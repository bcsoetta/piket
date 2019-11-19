<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$zZmv7HJjOcLaAwRKZB77t.g2ve/mchGx87ODSL7YyEb3PwHSFpNZ.',
                'remember_token' => null,
                'nip'            => '',
                'user_name'      => '',
            ],
        ];

        User::insert($users);
    }
}
