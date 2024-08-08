<h1 class="text-center my-4">Nueva Categoria</h1>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<form action="{{ route('category.update')}}" method="POST" class="w-50 mx-auto">
    @csrf
    <input type="hidden" name="id" value="{{ $category['id'] ?? '' }}">
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" value="{{ $category['name'] ?? '' }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" value="{{ $category['slug'] ?? '' }}" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Guardar</button>
</form>