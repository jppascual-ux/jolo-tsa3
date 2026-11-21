<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Exactly one user record.
     */
    public function run(): void
    {
        User::create([
            'username' => 'jdelacruz',
            'full_name' => 'Juan Dela Cruz',
            'email' => 'juan.delacruz@example.com',
        ]);
    }
}
