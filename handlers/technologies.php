<?php
/**
 * handlers/technologies.php
 * Gestiona operaciones CRUD para tecnologías
 */

require_once __DIR__ . '/../config/database.php';

class TechnologiesHandler {
    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    // Obtener todas las tecnologías
    public function getAll() {
        $query = "SELECT * FROM tecnologias WHERE activa = TRUE ORDER BY orden ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    
    // Obtener tecnología por ID
    public function getById($id) {
        $query = "SELECT * FROM tecnologias WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    
    // Crear tecnología
    public function create($data) {
        $query = "INSERT INTO tecnologias (nombre, icono, descripcion, nivel, experiencia_anos) 
                  VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        $nivel = $data['nivel'] ?? 5;
        $experiencia = $data['experiencia_anos'] ?? 0;
        
        $stmt->bind_param('sssid', 
            $data['nombre'],
            $data['icono'],
            $data['descripcion'],
            $nivel,
            $experiencia
        );
        
        return $stmt->execute();
    }
    
    // Actualizar tecnología
    public function update($id, $data) {
        $query = "UPDATE tecnologias SET nombre = ?, icono = ?, descripcion = ?, nivel = ?, experiencia_anos = ? WHERE id = ?";
        
        $stmt = $this->conn->prepare($query);
        $nivel = $data['nivel'] ?? 5;
        $experiencia = $data['experiencia_anos'] ?? 0;
        
        $stmt->bind_param('sssiid', 
            $data['nombre'],
            $data['icono'],
            $data['descripcion'],
            $nivel,
            $experiencia,
            $id
        );
        
        return $stmt->execute();
    }
    
    // Eliminar tecnología
    public function delete($id) {
        $query = "UPDATE tecnologias SET activa = FALSE WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
?>
