<!DOCTYPE html>
<html>
<head>
    <title>Autores</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Autores</h1>
    
    <a href="{{ route('autores.create') }}">Agregar Autor</a>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de Nacimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($autores as $autor)
            <tr>
                <td>{{ $autor->nombre }}</td>
                <td>{{ $autor->apellido }}</td>
                <td>{{ $autor->fecha_nacimiento }}</td>
                <td>
                <a href="{{ route('autores.edit', $autor->id) }}">Editar</a>
                <form action="{{ route('autores.destroy', $autor->id) }}" method="POST" style="display:inline;">
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
<a href="{{ route('libros.index') }}">ir a la tabla de libros</a>
</html>


