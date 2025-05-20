<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ejercicio</title>
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
            max-width: 600px;
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
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }
        .btn-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-save {
            background-color: #4CAF50;
            color: white;
        }
        .btn-save:hover {
            background-color: #45a049;
        }
        .btn-cancel {
            background-color: #f44336;
            color: white;
        }
        .btn-cancel:hover {
            background-color: #da190b;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Editar Ejercicio</h1>
        </div>
        @if ($errors->any())
            <ul class="text-left text-gray-500 dark:text-gray-400">
                @foreach($errors->all() as $error)
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <!-- Ícono X (Cruz) -->
                        <svg class="shrink-0 w-3.5 h-3.5 text-red-500 dark:text-red-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span>{{$error}}</span>
                    </li>
                @endforeach
            </ul>
        @endif
        <form  action="{{ route('exercise.update',$exercise) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Nombre del Ejercicio</label>
                <input type="text" id="name" name="name" value="{{ old('name',$exercise->name) }}" required>
            </div>

            <div class="form-group">
                <label for="grupo-muscular">Grupo Muscular</label>
                <select id="category" name="category" >
                    <option value="" >--Seleccione--</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected($exercise->category->id == $category->id) >{{ $category->name }}</option>
                        @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea id="description" name="description" required>{{$exercise->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="series">Series Recomendadas</label>
                <input type="number" id="series" name="series" value="4" min="1" max="10">
            </div>

            <div class="form-group">
                <label for="repeticiones">Repeticiones Recomendadas</label>
                <input type="number" id="repeticiones" name="repeticiones" value="10" min="1" max="30">
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" id="slug" name="slug" value="{{ old('slug',$exercise->slug) }}" required>
            </div>

            <div class="btn-actions">
                <button type="button" class="btn btn-cancel">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <button type="submit" class="btn btn-save">
                    <i class="fas fa-save"></i> Guardar
                </button>
            </div>
        </form>
    </div>
</body>
</html>