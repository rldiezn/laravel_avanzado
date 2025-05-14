<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Ejercicio</title>
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
        .exercise-card {
            width: 100%;
            max-width: 500px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .exercise-image {
            width: 100%;
            height: 300px;
            object-fit: contain; /* Cambiado de 'cover' a 'contain' */
            display: block; /* Agregado para centrar la imagen */
            margin: 0 auto; /* Agregado para centrar la imagen */
        }
        .exercise-content {
            padding: 20px;
        }
        .exercise-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .exercise-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin: 0;
        }
        .exercise-muscle-group {
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
        }
        .exercise-description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .exercise-details {
            display: flex;
            justify-content: space-between;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 10px;
        }
        .detail-item {
            text-align: center;
        }
        .detail-label {
            color: #888;
            font-size: 12px;
            margin-bottom: 5px;
        }
        .detail-value {
            font-weight: bold;
            color: #333;
        }
        .exercise-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }
        .btn {
            flex-grow: 1;
            margin: 0 5px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn i {
            margin-right: 5px;
        }
        .btn-edit {
            background-color: #2196F3;
        }
        .btn-edit:hover {
            background-color: #1976D2;
        }
        .btn-delete {
            background-color: #f44336;
        }
        .btn-delete:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="exercise-card">
        <img src="https://static.strengthlevel.com/images/exercises/bench-press/bench-press-400.avif" alt="Press de Banca" class="exercise-image">
        <div class="exercise-content">
            <div class="exercise-header">
                <h2 class="exercise-title">{{ $exercise->name }}</h2>
                <span class="exercise-muscle-group">{{ $exercise->category->name }}</span>
            </div>
            <p class="exercise-description">
                {{ $exercise->description }}
            </p>
            <div class="exercise-details">
                <div class="detail-item">
                    <div class="detail-label">Series</div>
                    <div class="detail-value">4</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Repeticiones</div>
                    <div class="detail-value">10-12</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Dificultad</div>
                    <div class="detail-value">Intermedio</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Descanso</div>
                    <div class="detail-value">{{$fecha}}</div>
                </div>
            </div>
            <div class="exercise-actions">
                <button class="btn btn-edit">
                    <i class="fas fa-edit"></i> Editar
                </button>
                <button class="btn btn-delete">
                    <i class="fas fa-trash-alt"></i> Eliminar
                </button>
            </div>
        </div>
    </div>
</body>
</html>