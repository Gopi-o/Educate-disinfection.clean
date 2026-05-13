<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'          => 'Администратор',
            'email'         => 'admin@san-centr.ru',
            'password'      => Hash::make('admin123'),
            'phone'         => '+7 (900) 000-00-00',
            'role'          => 'admin',
            'is_subscribed' => false,
        ]);

        $clients = [
            ['name' => 'Иван Петров', 'email' => 'ivan@mail.ru', 'phone' => '+7 (900) 111-11-11'],
            ['name' => 'Мария Сидорова', 'email' => 'maria@mail.ru', 'phone' => '+7 (900) 222-22-22'],
            ['name' => 'Алексей Кузнецов', 'email' => 'alex@mail.ru', 'phone' => '+7 (900) 333-33-33'],
        ];

        foreach ($clients as $client) {
            User::create([
                'name'          => $client['name'],
                'email'         => $client['email'],
                'password'      => Hash::make('password123'),
                'phone'         => $client['phone'],
                'role'          => 'user',
                'is_subscribed' => true,
            ]);
        }
    }
}
