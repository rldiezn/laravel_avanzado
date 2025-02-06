<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\HomeController;

Route::pattern('id', '[0-9]+');

Route::get('/', HomeController::class);//ejemplo de una ruta con invoke

//forma de generar rutas para crud mas corta
/*Route::group([
    'middleware' => ['throttle:60,1']
], function() {
    Route::resource('exercise', ExerciseController::class)
    ->parameters(['exercise'=>'id'])
    ->names('ejercicio')//en caso de querer asignar name en un resource route, se hace de esta forma
    ->whereNumber('exercise');
});*/

//forma de generar rutas para crud mas especifica
Route::group([
    'middleware' => [
        'throttle:60,1'  // limitamos intentos
    ],
    'prefix' => 'exercise',
    'as' => 'exercise.',  // Prefijo para los nombres de rutas
    'controller' => ExerciseController::class
],function(){
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/{id}','show')->name('show');
    Route::get('/edit/{id}','edit')->name('edit');
    Route::patch('/{id}','update')->name('update');
    Route::delete('/{id}','destroy')->name('destroy')->whereNumber('id');
});

Route::get('/test-composer', function() {
    dd(class_exists(\App\View\Composers\TrainingComposer::class));
});