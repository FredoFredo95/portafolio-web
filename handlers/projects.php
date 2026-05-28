<?php
/**
 * handlers/projects.php
 * Gestiona operaciones CRUD para proyectos
 */

require_once __DIR__ . '/../config/database.php';

class ProjectsHandler {
    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    // Obtener todos los proyectos
    public function getAll($estado = null) {
        $query = "SELECT * FROM proyectos";
        
        if ($estado) {
            $query .= " WHERE estado = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('s', $estado);
            $stmt->execute();
        } else {
            $query .= " ORDER BY orden ASC, created_at DESC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
        }
        
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    
    // Obtener proyecto por ID
    public function getById($id) {
        $query = "SELECT * FROM proyectos WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    
    // Crear proyecto
    public function create($data) {
        $query = "INSERT INTO proyectos (titulo, descripcion, tecnologias, emoji, url_demo, url_github, gradiente, estado, destacado) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        $destacado = $data['destacado'] ? 1 : 0;
        
        $stmt->bind_param('ssssssssi', 
            $data['titulo'],
            $data['descripcion'],
            $data['tecnologias'],
            $data['emoji'],
            $data['url_demo'],
            $data['url_github'],
            $data['gradiente'],
            $data['estado'],
            $destacado
        );
        
        return $stmt->execute();
    }
    
    // Actualizar proyecto
    public function update($id, $data) {
        $query = "UPDATE proyectos SET titulo = ?, descripcion = ?, tecnologias = ?, emoji = ?, 
                  url_demo = ?, url_github = ?, estado = ?, destacado = ? WHERE id = ?";
        
        $stmt = $this->conn->prepare($query);
        $destacado = $data['destacado'] ? 1 : 0;
        
        $stmt->bind_param('sssssssii', 
            $data['titulo'],
            $data['descripcion'],
            $data['tecnologias'],
            $data['emoji'],
            $data['url_demo'],
            $data['url_github'],
            $data['estado'],
            $destacado,
            $id
        );
        
        return $stmt->execute();
    }
    
    // Eliminar proyecto
    public function delete($id) {
        $query = "DELETE FROM proyectos WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
    
    // Incrementar visitas
    public function incrementViews($id) {
        $query = "UPDATE proyectos SET visitas = visitas + 1 WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
?>
