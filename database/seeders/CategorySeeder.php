<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
                'name' => 'Tren superior',
                'description' => 'Ejercicios enfocados en la parte superior del cuerpo, incluyendo pecho, brazos y espalda.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Tren inferior',
                'description' => 'Ejercicios enfocados en la parte inferior del cuerpo, principalmente piernas y glúteos.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('categories')->insert($categories);

        // Actualiza los ejercicios existentes con las categorías correspondientes
        // Tren superior (ID: 1) - Ejercicios de pecho (IDs: 1-3), brazos (IDs: 4-6) y espalda (IDs: 7-9)
        DB::table('exercises')->whereIn('id', [1, 2, 3, 4, 5, 6, 7, 8, 9])->update(['category_id' => 1]);

        // Tren inferior (ID: 2) - Ejercicios de piernas (IDs: 10-12)
        DB::table('exercises')->whereIn('id', [10, 11, 12])->update(['category_id' => 2]);
    }
}