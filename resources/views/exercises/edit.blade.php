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
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Editar Ejercicio</h1>
        </div>
        <form>
            <div class="form-group">
                <label for="nombre">Nombre del Ejercicio</label>
                <input type="text" id="nombre" name="nombre" value="{{$exercise->name}}" required>
            </div>

            <div class="form-group">
                <label for="grupo-muscular">Grupo Muscular</label>
                <select id="grupo-muscular" name="grupo-muscular" required>
                    <option value="pecho" selected>Pecho</option>
                    <option value="piernas">Piernas</option>
                    <option value="hombros">Hombros</option>
                    <option value="espalda">Espalda</option>
                    <option value="brazos">Brazos</option>
                </select>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" required>{{$exercise->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="series">Series Recomendadas</label>
                <input type="number" id="series" name="series" value="4" min="1" max="10">
            </div>

            <div class="form-group">
                <label for="repeticiones">Repeticiones Recomendadas</label>
                <input type="number" id="repeticiones" name="repeticiones" value="10" min="1" max="30">
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