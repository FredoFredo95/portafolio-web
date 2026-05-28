<?php
/**
 * handlers/messages.php
 * Gestiona operaciones CRUD para mensajes de contacto
 */

require_once __DIR__ . '/../config/database.php';

class MessagesHandler {
    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    // Obtener todos los mensajes
    public function getAll($leidos = null) {
        $query = "SELECT * FROM mensajes";
        
        if ($leidos !== null) {
            $query .= " WHERE leido = ?";
            $stmt = $this->conn->prepare($query);
            $leido = $leidos ? 1 : 0;
            $stmt->bind_param('i', $leido);
        } else {
            $stmt = $this->conn->prepare($query);
        }
        
        $query .= " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        
        if ($leidos !== null) {
            $leido = $leidos ? 1 : 0;
            $stmt->bind_param('i', $leido);
        }
        
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    
    // Obtener mensaje por ID
    public function getById($id) {
        $query = "SELECT * FROM mensajes WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    
    // Crear mensaje
    public function create($data) {
        $query = "INSERT INTO mensajes (nombre, email, asunto, mensaje) 
                  VALUES (?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bind_param('ssss', 
            $data['nombre'],
            $data['email'],
            $data['asunto'],
            $data['mensaje']
        );
        
        return $stmt->execute();
    }
    
    // Marcar como leído
    public function markAsRead($id) {
        $query = "UPDATE mensajes SET leido = TRUE WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
    
    // Eliminar mensaje
    public function delete($id) {
        $query = "DELETE FROM mensajes WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
    
    // Contar mensajes nuevos
    public function countNew() {
        $query = "SELECT COUNT(*) as count FROM mensajes WHERE leido = FALSE";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result['count'];
    }
}
?>
