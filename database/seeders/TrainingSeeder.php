<?php

namespace Database\Seeders;

use App\Models\Training;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Training::factory(10)->create()->each(function ($training){
            $training->image()->create([
                'url' => 'https://picsum.photos/400/300?random=' . $training->id
            ]);
        });
    }
}
