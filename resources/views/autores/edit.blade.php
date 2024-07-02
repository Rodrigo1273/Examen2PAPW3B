<!DOCTYPE html>
<html>
<head>
    <title>Editar Autor</title>
</head>
<body>
    <h1>Editar Autor</h1>
    <form action="{{ route('autores.update', ['autor' => $autor->id]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Necesario para que Laravel trate la solicitud como PUT -->
        
        <!-- Campos del formulario -->
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ $autor->nombre }}" required>
        <br>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="{{ $autor->apellido }}" required>
        <br>
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $autor->fecha_nacimiento }}" required>
        <br>
        <button type="submit">Actualizar</button>
    </form>

    <!-- Enlace para regresar a la lista de autores -->
    <a href="{{ route('autores.index') }}">Regresar a la lista de autores</a>
</body>
</html>




