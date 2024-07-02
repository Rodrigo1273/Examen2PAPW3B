<!DOCTYPE html>
<html>
<head>
    <title>Editar Libro</title>
</head>
<body>
    <h1>Editar Libro</h1>
    <form action="{{ route('libros.update', $libro) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="{{ $libro->titulo }}" required>
        <br>
        <label for="fecha_publicacion">Fecha de Publicación:</label>
        <input type="date" id="fecha_publicacion" name="fecha_publicacion" value="{{ $libro->fecha_publicacion }}" required>
        <br>
        <label for="autor_id">Autor:</label>
        <select id="autor_id" name="autor_id" required>
            @foreach($autores as $autor)
                <option value="{{ $autor->id }}" {{ $libro->autor_id == $autor->id ? 'selected' : '' }}>
                    {{ $autor->nombre }} {{ $autor->apellido }}
                </option>
            @endforeach
        </select>
        <br>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" value="{{ $libro->precio }}" required>
        <br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
