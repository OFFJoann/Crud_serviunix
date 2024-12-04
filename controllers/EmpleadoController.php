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
        $this->empleado->sueldo = $data['sueldo'];
        $this->empleado->fecha_ingreso = $data['fecha_ingreso'];
        $this->empleado->comentarios = $data['comentarios'];
        $this->empleado->genero_id = $data['genero_id'];
        $this->empleado->departamento_id = $data['departamento_id'];

        return $this->empleado->create();
    }

    public function read() {
        return $this->empleado->read();
    }

    // Método para actualizar un empleado
    public function update($id, $data) {
        // Asignamos los datos a la propiedad del objeto
        $this->empleado->id = $id;
        $this->empleado->nombres = $data['nombres'];
        $this->empleado->apellidos = $data['apellidos'];
        $this->empleado->sueldo = $data['sueldo'];
        $this->empleado->fecha_ingreso = $data['fecha_ingreso'];
        $this->empleado->comentarios = $data['comentarios'];
        $this->empleado->genero_id = $data['genero_id'];
        $this->empleado->departamento_id = $data['departamento_id'];

        return $this->empleado->update();  // Usamos el método update() del modelo
    }
    
    // Método para eliminar un empleado
    public function delete($id) {
        $this->empleado->id = $id;
        return $this->empleado->delete();  // Usamos el método delete() del modelo
    }

    // Método para obtener un empleado específico por ID
    public function readOne($id) {
        $this->empleado->id = $id;
        return $this->empleado->readOne();
    }
}
?>
