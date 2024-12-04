<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "../../controllers/EmpleadoController.php";
    $controller = new EmpleadoController();
    $controller->create($_POST);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/styles.css">
    <title>Agregar Empleado</title>
</head>
<body>
    <header>
        <h1>Agregar Nuevo Empleado</h1>
    </header>
    <main>
        <form action="create.php" method="POST">
            <label for="nombres">Nombres:</label>
            <input type="text" id="nombres" name="nombres" required>
            
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required>
            
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" required>
            
            <label for="fecha_ingreso">Fecha de Ingreso:</label>
            <input type="date" id="fecha_ingreso" name="fecha_ingreso" required>
            
            <label for="comentarios">Comentarios:</label>
            <textarea id="comentarios" name="comentarios"></textarea>
            
            <label for="genero_id">Género:</label>
            <select id="genero_id" name="genero_id" required>
                <option value="1">Masculino</option>
                <option value="2">Femenino</option>
            </select>
            
            <label for="departamento_id">Departamento:</label>
            <select id="departamento_id" name="departamento_id" required>
                <option value="1">TI</option>
                <option value="2">Servicio al Cliente</option>
                <option value="3">Recursos Humanos</option>
            </select>
            
            <button type="submit" class="btn">Guardar</button>
        </form>
    </main>
</body>
</html>
