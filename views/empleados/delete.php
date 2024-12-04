<?php
require_once "../../controllers/EmpleadoController.php";

$controller = new EmpleadoController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($controller->delete($id)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error al eliminar el empleado.";
    }
} else {
    die("ID no especificado.");
}
?>
