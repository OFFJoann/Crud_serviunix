<?php
require_once "../../controllers/EmpleadoController.php";

$controller = new EmpleadoController();
$empleados = $controller->read()->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/styles.css">
    <title>Listado de Empleados</title>
    </head>
<body>
    <header>
        <h1>Gestión de Empleados</h1>
        <a href="create.php" class="btn">Agregar Empleado</a>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Sueldo</th>
                    <th>Fecha de Ingreso</th>
                    <th>Comentarios</th>
                    <th>Género</th>
                    <th>Departamento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($empleados as $empleado): ?>
                    <tr>
                        <td><?= $empleado['id'] ?></td>
                        <td><?= htmlspecialchars($empleado['nombres']) ?></td>
                        <td><?= htmlspecialchars($empleado['apellidos']) ?></td>
                        <td><?= $empleado['sueldo'] ?></td>
                        <td><?= $empleado['fecha_ingreso'] ?></td>
                        <td><?= htmlspecialchars($empleado['comentarios']) ?></td>
                        <td><?= $empleado['genero_id'] ?></td>
                        <td><?= $empleado['departamento_id'] ?></td>
                        <td>
                            <a href="update.php?id=<?= $empleado['id'] ?>" class="btn btn-edit">Editar</a>
                            <a href="delete.php?id=<?= $empleado['id'] ?>" class="btn btn-delete" onclick="return confirm('¿Estás seguro de eliminar este empleado?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>