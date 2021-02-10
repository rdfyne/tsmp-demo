<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Perk Admin',
        	'role' => 'admin',
        	'email' => 'admin@perk.com',
        	'password' => Hash::make('password'),
        	'email_verified_at' => now(),
        ]);
    }
}
