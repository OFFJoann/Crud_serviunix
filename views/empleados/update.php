<?php
require_once "../../controllers/EmpleadoController.php";

$controller = new EmpleadoController();

if (isset($_GET['id'])) {
    // Obtener los datos del empleado a editar
    $id = $_GET['id'];
    $empleado = $controller->read()->fetch(PDO::FETCH_ASSOC);

    // Si el empleado no existe
    if (!$empleado) {
        die("Empleado no encontrado.");
    }

    // Si el formulario fue enviado, actualizamos el empleado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Preparamos los datos a actualizar
        $data = [
            'nombres' => $_POST['nombres'],
            'apellidos' => $_POST['apellidos'],
            'sueldo' => $_POST['sueldo'],
            'fecha_ingreso' => $_POST['fecha_ingreso'],
            'comentarios' => $_POST['comentarios'],
            'genero_id' => $_POST['genero_id'],
            'departamento_id' => $_POST['departamento_id'],
        ];
    
        // Llamamos al método update pasándole el ID y los datos
        if ($controller->update($id, $data)) {
            header("Location: index.php"); // Redirigir a la lista de empleados
            exit;
        } else {
            echo "Error al actualizar el empleado.";
        }
    }    
} else {
    die("ID no especificado.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/styles.css">
    <title>Editar Empleado</title>
</head>
<body>
    <header>
        <h1>Editar Empleado</h1>
        <a href="index.php" class="btn">Volver al Listado</a>
    </header>
    <main>
        <form method="POST">
            <label for="nombres">Nombres:</label>
            <input type="text" name="nombres" value="<?= htmlspecialchars($empleado['nombres']) ?>" required>

            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" value="<?= htmlspecialchars($empleado['apellidos']) ?>" required>

            <label for="sueldo">Sueldo:</label>
            <input type="number" name="sueldo" value="<?= $empleado['sueldo'] ?>" required>

            <label for="fecha_ingreso">Fecha de Ingreso:</label>
            <input type="date" name="fecha_ingreso" value="<?= $empleado['fecha_ingreso'] ?>" required>

            <label for="comentarios">Comentarios:</label>
            <textarea name="comentarios"><?= htmlspecialchars($empleado['comentarios']) ?></textarea>

            <label for="genero_id">Género:</label>
            <select name="genero_id" required>
                <option value="1" <?= ($empleado['genero_id'] == 1) ? 'selected' : '' ?>>Masculino</option>
                <option value="2" <?= ($empleado['genero_id'] == 2) ? 'selected' : '' ?>>Femenino</option>
                <!-- Añadir más opciones de género si es necesario -->
            </select>

            <label for="departamento_id">Departamento:</label>
            <select name="departamento_id" required>
                <option value="1" <?= ($empleado['departamento_id'] == 1) ? 'selected' : '' ?>>Recursos Humanos</option>
                <option value="2" <?= ($empleado['departamento_id'] == 2) ? 'selected' : '' ?>>IT</option>
                <!-- Añadir más departamentos si es necesario -->
            </select>

            <button type="submit" class="btn">Actualizar</button>
        </form>
    </main>
</body>
</html>
