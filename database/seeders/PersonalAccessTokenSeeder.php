<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class PersonalAccessTokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('Testing@123'),
        ]);

        $token = $user->createToken('access-token')->plainTextToken;

        $this->command->line("Personal Access Token: ${token}");
    }
}
