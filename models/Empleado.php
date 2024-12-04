<?php
class Empleado {
    private $conn;
    private $table = "empleados";

    public $id;
    public $nombres;
    public $apellidos;
    public $sueldo;
    public $fecha_ingreso;
    public $comentarios;
    public $genero_id;
    public $departamento_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " (nombres, apellidos, sueldo, fecha_ingreso, comentarios, genero_id, departamento_id) 
                  VALUES (:nombres, :apellidos, :sueldo, :fecha_ingreso, :comentarios, :genero_id, :departamento_id)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nombres", $this->nombres);
        $stmt->bindParam(":apellidos", $this->apellidos);
        $stmt->bindParam(":sueldo", $this->sueldo);
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

    // Método para obtener el nombre de la tabla
    public function getTable() {
        return $this->table;
    }

    // Método para actualizar un empleado
    public function update() {
        $query = "UPDATE " . $this->table . " 
                  SET nombres = :nombres, 
                      apellidos = :apellidos, 
                      sueldo = :sueldo, 
                      fecha_ingreso = :fecha_ingreso, 
                      comentarios = :comentarios, 
                      genero_id = :genero_id, 
                      departamento_id = :departamento_id 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":nombres", $this->nombres);
        $stmt->bindParam(":apellidos", $this->apellidos);
        $stmt->bindParam(":sueldo", $this->sueldo);
        $stmt->bindParam(":fecha_ingreso", $this->fecha_ingreso);
        $stmt->bindParam(":comentarios", $this->comentarios);
        $stmt->bindParam(":genero_id", $this->genero_id);
        $stmt->bindParam(":departamento_id", $this->departamento_id);

        return $stmt->execute();
    }

    // Método para eliminar un empleado
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    // Método para obtener un empleado por su ID
    public function readOne() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
