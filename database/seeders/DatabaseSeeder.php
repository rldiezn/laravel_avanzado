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

        //usando el factory para crear registros
        User::factory(1000)->create()->each(function ($user){
            //una vez creado esos registros de prueba los obtenemos y creamos perfiles asocioandolos a los usuarios
            Profile::factory(1)->create(['user_id' => $user->id])->each(function ($profile){
                //al terminar de crear los perfiles los obtenemos y creamos direcciones que seran asociadas a perfiles
                Address::factory(1)->create([
                    'profile_id' => $profile->id
                ]);
            });
        });

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Training::factory(10)->create()->each(function ($training){
            $training->image()->create([
                'url' => 'https://picsum.photos/400/300?random=' . $training->id
            ]);
        });

        Tag::factory(10)->create();
        $this->call(CategorySeeder::class);
        $this->call(ExerciseSeeder::class);

    }
}
