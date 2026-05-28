<?php
/**
 * handlers/skills.php
 * Gestiona operaciones CRUD para habilidades
 */

require_once __DIR__ . '/../config/database.php';

class SkillsHandler {
    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    // Obtener todas las habilidades
    public function getAll() {
        $query = "SELECT * FROM habilidades WHERE activa = TRUE ORDER BY orden ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    
    // Obtener habilidad por ID
    public function getById($id) {
        $query = "SELECT * FROM habilidades WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    
    // Crear habilidad
    public function create($data) {
        $query = "INSERT INTO habilidades (nombre, icono, descripcion, nivel) 
                  VALUES (?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        $nivel = $data['nivel'] ?? 5;
        
        $stmt->bind_param('sssi', 
            $data['nombre'],
            $data['icono'],
            $data['descripcion'],
            $nivel
        );
        
        return $stmt->execute();
    }
    
    // Actualizar habilidad
    public function update($id, $data) {
        $query = "UPDATE habilidades SET nombre = ?, icono = ?, descripcion = ?, nivel = ? WHERE id = ?";
        
        $stmt = $this->conn->prepare($query);
        $nivel = $data['nivel'] ?? 5;
        
        $stmt->bind_param('sssii', 
            $data['nombre'],
            $data['icono'],
            $data['descripcion'],
            $nivel,
            $id
        );
        
        return $stmt->execute();
    }
    
    // Eliminar habilidad
    public function delete($id) {
        $query = "UPDATE habilidades SET activa = FALSE WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
?>
