<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>People List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-4">
        <h1 class="text-center my-4">People</h1>
        
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Acciones</th> <!-- Asegúrate de incluir una columna para las acciones -->
                </tr>
            </thead>
            <tbody>
                @foreach($data as $people)
                <tr>
                    <td>{{ $people['name'] }}</td>
                    <td>{{ $people['telefono'] }}</td>
                    <td>{{ $people['direccion'] }}</td>
                    <td>
                        <a href="{{ route('people.delete', $people['id']) }}" class="btn btn-danger btn-sm">Borrar</a>
                        <a href="{{ route('people.view', $people['id']) }}" class="btn btn-primary btn-sm">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-center mt-4">
            <a href="{{ route('people.create') }}" class="btn btn-success btn-lg">Crear</a>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
