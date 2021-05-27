<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->command->line('Populating data from PIPL...');

        Person::factory(10)->create();

        $this->command->line('Done! Added 10 people.');
        $this->command->line('Generating personal access token...');

        $this->call(PersonalAccessTokenSeeder::class);
    }
}
