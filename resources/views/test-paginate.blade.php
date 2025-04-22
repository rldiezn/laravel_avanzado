<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"> --}}

</head>
<body>

    <h1>Usuarios</h1>

    <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
        @foreach ($users as $user)

            <li>
                {{ $user->name }} - {{ $user->email }}
            </li>

        @endforeach
    </ul>

    {{ $users->links() }}
</body>
</html>