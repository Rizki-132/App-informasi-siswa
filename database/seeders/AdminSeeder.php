<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'politekmi23@gmail.com'],
            [
                'name' => 'Politeknik Mardira Indonesia',
                'password' => Hash::make('Politeknik23'),
                'role' => 'admin',
            ]
        );
    }
}
