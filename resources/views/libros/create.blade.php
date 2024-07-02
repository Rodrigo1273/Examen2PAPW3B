<!DOCTYPE html>
<html>
<head>
    <title>Agregar Libro</title>
</head>
<body>
    <h1>Agregar Libro</h1>
    <form action="{{ route('libros.store') }}" method="POST">
        @csrf
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required>
        <br>
        <label for="fecha_publicacion">Fecha de Publicación:</label>
        <input type="date" id="fecha_publicacion" name="fecha_publicacion" required>
        <br>
        <label for="autor_id">Autor:</label>
        <select id="autor_id" name="autor_id" required>
            @foreach($autores as $autor)
                <option value="{{ $autor->id }}">{{ $autor->nombre }} {{ $autor->apellido }}</option>
            @endforeach
        </select>
        <br>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" required>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
