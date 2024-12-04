<?php
require_once "../../models/Empleado.php";
require_once "../../config/database.php";

class EmpleadoController {
    private $empleado;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->empleado = new Empleado($db);
    }

    public function create($data) {
        $this->empleado->nombres = $data['nombres'];
        $this->empleado->apellidos = $data['apellidos'];
        $this->empleado->edad = $data['edad'];
        $this->empleado->fecha_ingreso = $data['fecha_ingreso'];
        $this->empleado->comentarios = $data['comentarios'];
        $this->empleado->genero_id = $data['genero_id'];
        $this->empleado->departamento_id = $data['departamento_id'];

        return $this->empleado->create();
    }

    public function read() {
        return $this->empleado->read();
    }
}
