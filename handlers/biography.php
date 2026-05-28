<?php
/**
 * handlers/biography.php
 * Gestiona la biografía/perfil principal
 */

require_once __DIR__ . '/../config/database.php';

class BiographyHandler {
    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    // Obtener biografía (siempre hay una)
    public function get() {
        $query = "SELECT * FROM biografia LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    
    // Actualizar biografía
    public function update($data) {
        $query = "UPDATE biografia SET nombre = ?, apellido = ?, titulo = ?, descripcion = ?, ubicacion = ?, disponible = ? WHERE id = 1";
        
        $stmt = $this->conn->prepare($query);
        $disponible = $data['disponible'] ? 1 : 0;
        
        $stmt->bind_param('sssssi', 
            $data['nombre'],
            $data['apellido'],
            $data['titulo'],
            $data['descripcion'],
            $data['ubicacion'],
            $disponible
        );
        
        return $stmt->execute();
    }
}
?>
