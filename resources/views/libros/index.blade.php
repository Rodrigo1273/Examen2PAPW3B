<!DOCTYPE html>
<html>
<head>
    <title>Libros</title>
</head>
<body>
    <h1>Libros</h1>
    <a href="{{ route('libros.create') }}">Agregar Libro</a>
    <table border="1">
        <thead>
            <tr>
                <th>Título</th>
                <th>Fecha de Publicación</th>
                <th>Autor</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($libros as $libro)
            <tr>
                <td>{{ $libro->titulo }}</td>
                <td>{{ $libro->fecha_publicacion }}</td>
                <td>{{ $libro->autor->nombre }} {{ $libro->autor->apellido }}</td>
                <td>{{ $libro->precio }}</td>
                <td>
                    <a href="{{ route('libros.edit', $libro) }}">Editar</a>
                    <form action="{{ route('libros.destroy', $libro) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
<a href="{{ route('autores.index') }}">ir a la tabla de autores</a>
</html>
