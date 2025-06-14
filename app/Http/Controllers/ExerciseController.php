<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExerciseRequest;
use App\Jobs\ResizeImage;
use App\Models\Category;
use App\Models\Exercise;
use App\Events\ImageUploaded;
use Database\Seeders\ExerciseSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PhpParser\Node\Expr;
use Intervention\Image\Laravel\Facades\Image;

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
        // Crear el ejercicio primero
        $exercise = Exercise::create([
            'name' => $request->name,
            'category_id' => $request->category,
            'description' => $request->description,
            'slug' => $request->slug ?? Str::slug($request->name)
        ]);

        // Validar si se ha subido una imagen
        if($request->hasFile('image')) {
            // Guardar imagen original en S3
            $imgS3 = Storage::disk('s3')->put('exercises', $request->file('image'));
            
            // Guardar temporalmente para procesamiento
            $imageContent = file_get_contents($request->file('image')->getPathName());
            
            // Generar nombre base único
            $baseFileName = Str::random(40);
            
            
            // 🔥 Disparar evento - procesará las 3 versiones
            event(new ImageUploaded($imageContent, $exercise->id, $baseFileName));
            
            // Actualizar ejercicio con imagen original
            $exercise->update(['image_path' => $imgS3]);
        }

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

    public function update(ExerciseRequest $request, Exercise $exercise)
    {
        // Validar si se ha subido una imagen
        if($request->hasFile('image')) {
            // Limpiar imágenes anteriores
            $this->cleanOldImages($exercise);
            
            // Guardar imagen original en S3
            $imgS3 = Storage::disk('s3')->put('exercises/original', $request->file('image'), ['visibility' => 'public']);
            
            // Guardar temporalmente para procesamiento
            $imageContent = file_get_contents($request->file('image')->getPathName());
            
            // Generar nombre base único
            $baseFileName = Str::random(40);
            
            // 🔥 Disparar evento - procesará las 3 versiones
            event(new ImageUploaded($imageContent, $exercise->id, $baseFileName));
            
            // Actualizar con imagen original (temporal hasta que desktop esté listo)
            $exercise->update([
                'name' => $request->name,
                'category_id' => $request->category,
                'description' => $request->description,
                'image_path' => $imgS3,
                'slug' => $request->slug ?? Str::slug($request->name)
            ]);
        } else {
            // Si no hay imagen nueva, solo actualizar otros campos
            $exercise->update([
                'name' => $request->name,
                'category_id' => $request->category,
                'description' => $request->description,
                'slug' => $request->slug ?? Str::slug($request->name)
            ]);
        }

        return redirect()->route('exercise.edit', $exercise);
    }

    /**
     * Limpiar imágenes anteriores
     */
    private function cleanOldImages($exercise)
    {
        $imagesToDelete = [
            $exercise->image_path,
            $exercise->thumbnail_path,
            $exercise->tablet_path,
            $exercise->desktop_path
        ];
        
        foreach($imagesToDelete as $imagePath) {
            if($imagePath) {
                Storage::disk('s3')->delete($imagePath);
            }
        }
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
