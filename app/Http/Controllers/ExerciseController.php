<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ejercicios = [
            [
                'ejercicio' => 'Press de Banca',
                'grupo_muscular' => 'Pecho',
                'descripcion' => 'Ejercicio fundamental para desarrollar los músculos pectorales'
            ],
            [
                'ejercicio' => 'Sentadillas (Squats)',
                'grupo_muscular' => 'Piernas',
                'descripcion' => 'Ejercicio compuesto que trabaja cuádriceps, glúteos y piernas'
            ],
            [
                'ejercicio' => 'Elevaciones Laterales',
                'grupo_muscular' => 'Hombros',
                'descripcion' => 'Ejercicio para desarrollar los deltoides laterales'
            ],
            [
                'ejercicio' => 'Peso Muerto',
                'grupo_muscular' => 'Espalda y Piernas',
                'descripcion' => 'Ejercicio que trabaja múltiples grupos musculares'
            ],
            [
                'ejercicio' => 'Curl de Bíceps',
                'grupo_muscular' => 'Brazos',
                'descripcion' => 'Ejercicio para desarrollar los músculos bíceps'
            ]
        ];

        return view('exercises.index',compact('ejercicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('exercises.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'esta es la ruta para crear un ejercicio';
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return view('exercises.show',['idExersice'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        return view('exercises.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return 'Esta es la ruta para mandar a editar los datos de un ejercicios';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'esta es la ruta para borrar';
    }
}
