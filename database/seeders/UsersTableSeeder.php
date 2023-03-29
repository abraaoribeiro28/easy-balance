<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'      => 'Usuário 01',
            'email'     => 'root01@root.com',
            'password'  => bcrypt('123123'),
            'image_path'  => 'users/user.png',
        ]);

        User::create([
            'name'      => 'Usuário 02',
            'email'     => 'root02@root.com',
            'password'  => bcrypt('123123'),
            'image_path'  => 'users/user.png',
        ]);
    }
}
