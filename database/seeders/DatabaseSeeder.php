<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use App\Models\Profile;
use App\Models\Training;
use App\Models\Tag;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //usando el factories para crear registros
        $this->call([
            UserSeeder::class,
            TrainingSeeder::class,
            TagSeeder::class,
            CategorySeeder::class,
            ExerciseSeeder::class
        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
