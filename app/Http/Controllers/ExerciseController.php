<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExerciseRequest;
use App\Models\Category;
use App\Models\Exercise;
use Database\Seeders\ExerciseSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PhpParser\Node\Expr;

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
        return view('exercises.create')->with('categories' , Category::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExerciseRequest $request)
    {

        Exercise::create([
            'name' => $request->name,
            'category_id' => $request->category,
            'description' => $request->description,
            'slug' => $request->slug ?? Str::slug($request->name)
        ]);

        return redirect()->route('exercise.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Exercise $exercise)
    {
        return view('exercises.show',compact('exercise'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exercise $exercise)
    {
        $categories = Category::all();
        return view('exercises.edit',compact('exercise','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExerciseRequest $request, Exercise $exercise)
    {

        $exercise->update([
            'name' => $request->name,
            'category_id' => $request->category,
            'description' => $request->description,
            'slug' => $request->slug ?? Str::slug($request->name)
        ]);

        return redirect()->route('exercise.edit',$exercise);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercise $exercise)
    {
        $exercise->delete();
        return redirect()->route('exercise.index');
    }
}
