<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Ejercicios de pecho
        $chestExercises = [
            [
                'name' => 'Press de banca',
                'description' => 'Acuéstate en un banco plano, agarra la barra con las manos a una distancia un poco mayor que el ancho de los hombros. Baja la barra controladamente hacia el pecho y luego empuja hacia arriba hasta extender los brazos completamente. Mantén los pies firmemente en el suelo y la espalda baja apoyada en el banco durante todo el movimiento.',
                'category_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Aperturas con mancuernas',
                'description' => 'Acuéstate en un banco plano sosteniendo mancuernas en cada mano. Con los brazos extendidos sobre el pecho, baja lentamente los brazos hacia los lados, manteniendo un ligero doblez en los codos. Siente el estiramiento en los pectorales y luego vuelve a la posición inicial juntando las mancuernas en la parte superior.',
                'category_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Fondos en paralelas',
                'description' => 'Sujétate en las barras paralelas con los brazos extendidos y el cuerpo suspendido. Baja el cuerpo flexionando los codos hasta que los hombros estén a la altura de los codos o ligeramente por debajo. Empuja hacia arriba hasta la posición inicial, extendiendo completamente los brazos. Mantén el torso ligeramente inclinado hacia adelante para enfocarte en los pectorales.',
                'category_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        // Ejercicios de brazos
        $armExercises = [
            [
                'name' => 'Curl de bíceps con barra',
                'description' => 'De pie, sostén una barra con las palmas hacia arriba y los brazos extendidos. Manteniendo los codos cerca del cuerpo, levanta la barra curvando los brazos y contrayendo los bíceps. Sube hasta que los antebrazos estén verticales y luego baja controladamente a la posición inicial.',
                'category_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Extensiones de tríceps con polea',
                'description' => 'Frente a una máquina de poleas, agarra un mango con ambas manos. Con los codos doblados y cerca de la cabeza, extiende los brazos hacia abajo, enfocándote en contraer los tríceps. Mantén los codos estacionarios durante todo el movimiento y regresa lentamente a la posición inicial.',
                'category_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Martillo con mancuernas',
                'description' => 'De pie, sostén mancuernas con los brazos a los lados y las palmas mirando hacia tu cuerpo (agarre de martillo). Manteniendo los codos fijos, levanta las mancuernas doblando los codos. Contrae los bíceps en la parte superior y baja controladamente. Este ejercicio trabaja tanto el bíceps como el braquial anterior.',
                'category_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        // Ejercicios de espalda
        $backExercises = [
            [
                'name' => 'Dominadas',
                'description' => 'Cuélgate de una barra con las manos a una distancia un poco mayor que el ancho de los hombros y las palmas mirando hacia adelante. Tira de tu cuerpo hacia arriba hasta que tu barbilla esté por encima de la barra, concentrándote en juntar los omóplatos. Baja controladamente hasta extender completamente los brazos.',
                'category_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Remo con barra',
                'description' => 'Inclínate hacia adelante con las rodillas ligeramente flexionadas, manteniendo la espalda recta. Agarra una barra con las manos a la anchura de los hombros. Tira de la barra hacia tu abdomen inferior, juntando los omóplatos al final del movimiento. Baja la barra controladamente hasta extender los brazos.',
                'category_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Pulldown en máquina',
                'description' => 'Siéntate en la máquina de pulldown con los muslos asegurados bajo los cojines. Agarra la barra con las manos más anchas que los hombros. Tira de la barra hacia abajo hasta el pecho, juntando los omóplatos al final. Regresa lentamente a la posición inicial con los brazos extendidos.',
                'category_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        // Ejercicios de piernas
        $legExercises = [
            [
                'name' => 'Sentadillas',
                'description' => 'Colócate de pie con los pies a la anchura de los hombros. Baja el cuerpo flexionando las rodillas y las caderas, como si te sentaras en una silla invisible. Mantén el pecho erguido y la espalda recta. Baja hasta que los muslos estén paralelos al suelo (o según tu movilidad) y luego sube empujando a través de los talones.',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Peso muerto',
                'description' => 'Colócate frente a una barra con los pies a la anchura de las caderas. Flexiona las caderas y rodillas para agarrar la barra con las manos a la anchura de los hombros. Manteniendo la espalda recta, levanta la barra extendiendo las caderas y rodillas. Baja la barra controladamente, empujando las caderas hacia atrás y doblando las rodillas.',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Extensiones de piernas',
                'description' => 'Siéntate en la máquina de extensiones con las rodillas dobladas y los tobillos detrás de los rodillos acolchados. Extiende las piernas hasta que estén completamente rectas, contrayendo los cuádriceps. Haz una pausa en la posición extendida y luego baja lentamente a la posición inicial.',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        // Insertar todos los ejercicios en la base de datos
        DB::table('exercises')->insert(array_merge(
            $chestExercises,
            $armExercises,
            $backExercises,
            $legExercises
        ));
    }
}