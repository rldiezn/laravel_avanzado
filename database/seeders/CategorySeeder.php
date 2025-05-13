<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $categories = [
            [
                'training_id' => 1,
                'name' => 'Tren superior',
                'description' => 'Ejercicios enfocados en la parte superior del cuerpo, incluyendo pecho, brazos y espalda.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'training_id' => 1,
                'name' => 'Tren inferior',
                'description' => 'Ejercicios enfocados en la parte inferior del cuerpo, principalmente piernas y glúteos.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        foreach ($categories as $categoryData) {
            $category = Category::create($categoryData);

            // Crear imagen para esta categoría
            $category->image()->create([
                'url' => 'https://picsum.photos/400/300?random=' . $category->id
            ]);
        }

        // DB::table('categories')->insert($categories);


    }
}