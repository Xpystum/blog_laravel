<?php

namespace Database\Seeders;


use App\Modules\User\Domain\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'email' => 'test@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
