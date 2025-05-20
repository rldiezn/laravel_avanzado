<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Ejercicios</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 100%;
            /*max-width: 900px;*/
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin: 0;
        }
        .btn-create {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            font-size: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            transition: background-color 0.3s ease;
        }
        .btn-create:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
            padding: 5px;
            transition: color 0.3s ease;
        }
        .btn-show {
            color: #69b2d5;
        }
        .btn-show:hover {
            color: #09acf8;
        }
        .btn-edit {
            color: #4CAF50;
        }
        .btn-edit:hover {
            color: #45a049;
        }
        .btn-delete {
            color: #f44336;
        }
        .btn-delete:hover {
            color: #da190b;
        }
    </style>
</head>
<body>
  <div class="container mx-auto">
    @php
        $mensajeEspecial = "esta es una variable para probar como pasarle variables php a componentes";
    @endphp
    <x-alert type="info" :specialMessage="$mensajeEspecial">
      <!--Extructura para pasar slot con nombre (multiples variables) -->
      <x-slot name="spanTitle">
        <b>Alerta!</b>
      </x-slot>
        Este es un mensaje de alerta con estilo de liveware
    </x-alert>
    {{-- Ejemplo de componente anonimo (sin clase) --}}
    <x-anonimo.title secondTitle="Un titulito">
        Listado de Ejercicios
    </x-anonimo.title>

    <div class="header">
        <a href="/exercise/create">
            <button class="btn-create" title="Crear Nuevo Ejercicio">
                <i class="fas fa-plus"></i>
            </button>
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Ejercicio</th>
                <th>Grupo Muscular</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
          @forelse ($ejercicios as $ejercicio)
            <tr>
                <td>{{ $ejercicio->name }}</td>
                <td>{{ $ejercicio->category->name }}</td>
                <td>{{ $ejercicio->description }}</td>
                <td>
                  <div class="action-buttons">
                    <a href="{{ route('exercise.show', $ejercicio) }}">
                      <button class="btn btn-show" title="Editar">
                          <i class="fas fa-eye"></i>
                      </button>
                    </a>
                    <a href="{{ route('exercise.edit', $ejercicio) }}">
                      <button class="btn btn-edit" title="Editar">
                          <i class="fas fa-edit"></i>
                      </button>
                    </a>
                        <form action="{{ route('exercise.destroy',$ejercicio) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" title="Eliminar">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                  </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4">Sin informacion</td>
            </tr>
          @endforelse
        </tbody>
      </table>

  </div>


    <script>
      let ejercicios = @json($ejercicios);
      console.log(ejercicios);
    </script>
</body>
</html>