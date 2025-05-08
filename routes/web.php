<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Profile;
use App\Models\Category;


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

Route::get('/test-query-builder',function(){

    //ejemplo de consulta generica
    $exercices = DB::table('exercises')
    ->where('id','<>','3')
    ->get();

    //ejemplo de consulta con find
    $exercices = DB::table('exercises')->find(5);

    //ejemplo de consulta con pluck
    $exercices = DB::table('exercises')
    ->where('id','<>','3')
    ->pluck("name",'id');

    //ejemplo de consulta truncada (chunck)
    $users = DB::table('users')
    ->orderBy('id','asc')
    ->chunk(100,function ($lote){

        foreach($lote as $user){
            //echo $user->name . '<br>';
        }

    });

    //ejemplo de consulta truncada (lazy)
    $users = DB::table('users')
    ->orderBy('id','asc')
    ->lazy()->each(function($user){
        //echo $user->name . '<br>';
    });


    //ejemplo de count
    $users = DB::table('users')->count();

    //ejemplo de max obtener el id maximo de la tabla
    $users = DB::table('users')->max('id');

    //ejemplo de min obtener el id minimo de la tabla
    $users = DB::table('users')->min('id');

    //ejemplo de avg obtener promedio de la columna id
    $users = DB::table('users')->avg('id');

    //ejemplo para validar si un registro existe
    $email = "martine78@example.com";
    if(DB::table('users')->where('email',$email)->exists()){
        $users = "El email $email existe :D";
    }else{
        $users = "El email $email no existe :(";
    }

    //ejemplo para validar si un registro NO existe
    $email = "rldiezn@gmail.com";
    if(DB::table('users')->where('email',$email)->doesntExist()){
        $users = "El email $email no existe :(";
    }else{
        $users = "El email $email existe :D";
    }

    //Ejemplo para traer campos especificos
    $users = DB::table('users')
    ->select('id','name as nombreUsuario','email')
    ->get();

    //Ejemplo para traer campos especificos 'Raw' (con sentencias sql opcion1)
    $users = DB::table('users')
    ->select('id','name as nombreUsuario','email',DB::raw('concat(name,"-",remember_token) as username'))
    ->get();

    //Ejemplo para traer campos especificos 'Raw' (con sentencias sql opcion2)
    $users = DB::table('users')
    ->select('id','name as nombreUsuario')
    ->selectRaw('concat(name,"-",remember_token) as username')
    ->get();

    //Ejemplo de orWhere
    $users = DB::table('users')
    ->where('email','LIKE','%@example.org%')
    ->orWhere('email','LIKE','%@example.net%')
    ->get();

    //Ejemplo de whereNot
    $users = DB::table('users')
    ->whereNot('email','LIKE','%@example.com%')
    ->get();

    //Ejemplo de whereBetween treara los registro del 1 al 100
    $users = DB::table('users')
    ->whereBetween('id',[1,100])
    ->get();

    //Ejemplo de whereNotBetween exluira los registros del 1 al 100
    $users = DB::table('users')
    ->whereNotBetween('id',[1,100])
    ->get();

    //Ejemplo de whereIn solo traera el id 1 y el id 100
    $users = DB::table('users')
    ->whereIn('id',[1,100])
    ->get();

    //Ejemplo de whereNotIn excluira al id 1 y 100
    $users = DB::table('users')
    ->whereNotIn('id',[1,100])
    ->get();

    //Ejemplo de whereNull
    $users = DB::table('exercises')
    ->whereNull('category_id')
    ->get();

    //Ejemplo de whereNotNull
    $users = DB::table('exercises')
    ->whereNotNull('category_id')
    ->get();

    //Ejemplo de whereDate
    $users = DB::table('users')
    ->whereDate('created_at','2025-04-16')
    //->whereDate('created_at','>','2025-04-16')
    ->get();

    //Ejemplo de whereMonth treara solo los registros del mes de abril
    $users = DB::table('users')
    ->whereMonth('created_at','4')
    ->get();

    //Ejemplo de whereDay treara solo los registros de dia 4
    $users = DB::table('users')
    ->whereDay('created_at','16')
    ->get();

    //Ejemplo de whereYear treara solo los registros de año 2025
    $users = DB::table('users')
    ->whereYear('created_at','2025')
    ->get();

    //Ejemplo de whereTime
    $users = DB::table('users')
    //->whereTime('created_at','03:33:40')
    ->whereTime('created_at','>','03:30')
    ->get();

    //Ejemplo de whereYear treara solo los registros de año 2025
    $users = DB::table('users')
    ->whereColumn('created_at','updated_at')
    ->get();

    //Ejemplo de agrupaciones logicas
    $users = DB::table('users')
    ->where("id",">=",10)
    ->where(function ($query){
        $query->where('email','LIKE','%@example.org%')
            ->orWhere('email','LIKE','%@example.net%');
    })
    ->get();

    //Ejemplo order_by
    $users = DB::table('users')
    ->orderBy('id')
    ->get();

     //Ejemplo latest ordena de manera descendente
     $users = DB::table('users')
     ->latest('id')
     ->get();

     //Ejemplo oldtest ordena de manera ascendente
     $users = DB::table('users')
     ->oldest('id')
     ->get();

     //Ejemplo inRandomOrder ordena de manera aleatoria
     $users = DB::table('users')
     ->inRandomOrder( )
     ->get();

     //Ejemplo groupBy y having (el havign es como el where pero este tambien reconoces las columnas agregadas en el query como por ejemplo en este caso la columna ejercises_per_category)
     $users = DB::table('exercises')
     ->select('category_id')
     ->selectRaw('count(*) as ejercises_per_category')
     ->groupBy('category_id')
     ->having('ejercises_per_category','<','12')
     ->get();

    //Ejemplo take, solo obtener 10 registros
    $users = DB::table('users')
    ->take(10)
    ->get();

    //Ejemplo skip, solo obtener 10 registros pero ignorando los primeros 3
    $users = DB::table('users')
    ->skip(3)
    ->take(10)
    ->get();

    //Ejemplo limit y offset, solo obtener 10 registros pero ignorando los primeros 3
    $users = DB::table('users')
    ->offset(3)
    ->limit(10)
    ->get();

    //Ejemplo when
    $flag = true;
    $users = DB::table('users')
    ->when($flag,function($qry){
        $qry->where('id','>=',10);
    })
    ->get();

    //Ejemplo de insert con query builder
    $users = DB::table('exercises')
    ->insert(
        [
            [
                'name' => "Sentadilla bulgara",
                'description' => "Que feo ejercicio la verdad",
                'category_id' => 2
            ]
        ]
    );

    //MEtodo que permite insertar si no existe el email y si existe actualiza los campos especificados
    $users = DB::table('users')
        ->upsert(
                [
                    'name' => "Ricardo Luis Diez Noria",
                    'email' => "rldiezn@gmail.com",
                    'password' => bcrypt('18275774')
                ],
                [
                    'email'
                ],
                [
                    'name'
                ]
    );

    //ejemplo de update
    $users = DB::table('users')
    ->where('email',"rldiezn@gmail.com")
    ->update([
        'name' => 'Ricardo L Diez N',

    ]);

    //ejemplo de updateOrInsert metodo que busca si existe el filtro especificado en el primer array y en caso de existir edita si no existe inserta
    $users = DB::table('users')
    ->updateOrInsert(
        [
            //filtra la busqueda por lo que pasemos en el primer array
            'email' => "rldiezn.dev@gmail.com"
        ],
        [
           'name' => 'Ricardo L Diez N',
           'password' => bcrypt('18275774'),
           'remember_token' =>  2
        ]
    );

    //ejemplo de update
    $users = DB::table('users')
    ->where('email',"rldiezn@gmail.com")
    ->delete();

    return $users;

});

Route::get('/test-query-builder-exercises',function(){

    //Ejemplo Joins
    $users = DB::table('exercises as e')
    ->join('categories as c','e.category_id','=','c.id')
    ->select('e.*','c.name as category_name','c.description as category_description')
    ->get();

    return $users;

});


Route::get('/test-query-builder-paginate',function(){

    //ejemplo de paginate
    $users = DB::table('users')
    ->paginate(15,['*'],'pag_user')
    // ->simplePaginate(15,['*'],'pag_user')
    ;

    return view('test-paginate',compact('users'));

});

Route::get('/test-eloquent',function(){

    //ejemplo de obterner datos mediante eloquent
    $users = User::orderBy('id','desc')->get();

    //ejemplo de insertar datos mediante eloquent
    $users = new User();

    $users->name = "Maricruz Hernandez Romero";
    $users->email = "maricruuzz47@gmail.com";
    $users->password = bcrypt('123456');

    //$users->save();

    //ejemplo de insertar masivamente datos mediante eloquent
    $params = [
        'name' => 'Isometricos',
        'description' => 'Ejercicio que tranbajan la resistencia muscular mediante posiciones estaticas'
    ];

    //$new_category = Category::create($params);

    $categories = [
        [
            'name' => 'Isometricos',
            'description' => 'Ejercicio que trabajan la resistencia muscular mediante posiciones estaticas'
        ],
        [
            'name' => 'Cardiovascular',
            'description' => 'Ejercicios que aumentan la frecuencia cardíaca y mejoran la capacidad pulmonar'
        ],
        [
            'name' => 'Flexibilidad',
            'description' => 'Ejercicios que mejoran el rango de movimiento de las articulaciones'
        ],
        [
            'name' => 'Funcional',
            'description' => 'Ejercicios que simulan movimientos de la vida diaria'
        ]
    ];

    $new_category = [];
    foreach ($categories as $category) {
        //$new_category[] = Category::create($category);
    }

    //return $new_category;


    //ejemplo para editar datos con eloquent
    $user = User::find(100);

    $user->email = $user->email.".test.r10";
    $user->save();

    //ejemplo para edicion masiva con eloquent
    $params =[
        'name' => 'prueba de curso laraval'
    ];

    $user = User::find(100);

    $user->update($params);

    //Ejemplo de eliminacion con Eloquent
    $user = User::find(80);
    //$user->delete();

    //Ejemplo de eliminacion masiva con Eloquent
    $users_id = [79,78,77];
    $user = User::whereIn('id',$users_id)->delete();

    $user = User::find(875);
    $user_profile = $user->profile;

    $profile = Profile::find(875);
    $profile_user = $profile->user;

    return $profile_user;

});