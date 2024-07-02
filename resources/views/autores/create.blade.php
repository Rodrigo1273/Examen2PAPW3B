<!DOCTYPE html>
<html>
<head>
    <title>Agregar Autor</title>
</head>
<body>
    <h1>Agregar Autor</h1>
    <form action="{{ route('autores.store') }}" method="POST">
    @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    <br>
    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" required>
    <br>
    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
    <br>
    <button type="submit">Guardar</button>
</form>

    </form>
</body>
</html>
