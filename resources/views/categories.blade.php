<h1 class="text-center my-4">Categoria</h1>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Nombre</th>
            <th>Slug</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $category)
        <tr>
            <td>{{ $category['name'] }}</td>
            <td>{{ $category['slug'] }}</td>
            <td>
                <a href="{{ route('category.delete', $category['id']) }}" class="btn btn-danger btn-sm">Borrar</a>
                <a href="{{ route('category.view', $category['id']) }}" class="btn btn-primary btn-sm">Ver</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="text-center mt-4">
    <a href="{{ route('category.create') }}" class="btn btn-success btn-lg">Crear</a>
</div>
