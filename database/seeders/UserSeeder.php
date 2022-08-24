<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Super',
                'email' => 'super@trov.com',
                'roles' => 'super_admin',
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@trov.com',
                'roles' => 'admin',
            ],
            [
                'name' => 'Editor',
                'email' => 'editor@trov.com',
                'roles' => 'editor',
            ],
        ];

        foreach ($users as $user) {
            User::factory()->create([
                'name' => $user['name'],
                'email' => $user['email'],
            ])->assignRole($user['roles']);
        }
    }
}
