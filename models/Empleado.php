<?php
class Empleado {
    private $conn;
    private $table = "empleados";

    public $id;
    public $nombres;
    public $apellidos;
    public $edad;
    public $fecha_ingreso;
    public $comentarios;
    public $genero_id;
    public $departamento_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " (nombres, apellidos, edad, fecha_ingreso, comentarios, genero_id, departamento_id) 
                  VALUES (:nombres, :apellidos, :edad, :fecha_ingreso, :comentarios, :genero_id, :departamento_id)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nombres", $this->nombres);
        $stmt->bindParam(":apellidos", $this->apellidos);
        $stmt->bindParam(":edad", $this->edad);
        $stmt->bindParam(":fecha_ingreso", $this->fecha_ingreso);
        $stmt->bindParam(":comentarios", $this->comentarios);
        $stmt->bindParam(":genero_id", $this->genero_id);
        $stmt->bindParam(":departamento_id", $this->departamento_id);

        return $stmt->execute();
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
