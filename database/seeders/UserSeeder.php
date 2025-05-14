<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(1000)->create()->each(function ($user){
            //una vez creado esos registros de prueba los obtenemos y creamos perfiles asocioandolos a los usuarios
            Profile::factory(1)->create(['user_id' => $user->id])->each(function ($profile){
                //al terminar de crear los perfiles los obtenemos y creamos direcciones que seran asociadas a perfiles
                Address::factory(1)->create([
                    'profile_id' => $profile->id
                ]);
            });
        });
    }
}
