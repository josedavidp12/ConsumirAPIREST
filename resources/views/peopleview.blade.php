<h1 class="text-center my-4">Actualizar Persona</h1>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<form action="{{ route('people.update', ['idPeople' => $people['id']]) }}" method="POST" class="w-50 mx-auto">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" value="{{ $people['name'] }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" id="direccion" value="{{ $people['direccion'] }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" id="telefono" value="{{ $people['telefono'] }}" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Guardar</button>
</form>
