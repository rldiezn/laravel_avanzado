<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ejercicios = Exercise::all();

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
        $exercise = Exercise::find($id);
        return view('exercises.show',compact('exercise'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $exercise = Exercise::find($id);
        return view('exercises.edit',compact('exercise'));
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
