<?php
/**
 * process-login.php
 * 
 * Procesa el formulario de inicio de sesión validando contra MySQL.
 * Usa password_verify para validación segura de contraseñas.
 */

// Incluir conexión
require_once __DIR__ . '/config/database.php';

// Iniciar sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Solo procesar si es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Obtener datos del formulario
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    
    // Validar que no estén vacíos
    if (empty($email) || empty($password)) {
        $_SESSION['login_error'] = 'Email y contraseña son requeridos';
        header('Location: index.php#loginModal');
        exit;
    }
    
    // Buscar usuario en MySQL
    $query = "SELECT id, email, password_hash, nombre FROM admins WHERE email = ?";
    $stmt = $mysqli->prepare($query);
    
    if (!$stmt) {
        $_SESSION['login_error'] = 'Error en el servidor. Intenta de nuevo.';
        header('Location: index.php#loginModal');
        exit;
    }
    
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verificar contraseña usando password_verify
        if (password_verify($password, $user['password_hash'])) {
            // Credenciales correctas - iniciar sesión
            $_SESSION['admin'] = true;
            $_SESSION['admin_id'] = $user['id'];
            $_SESSION['admin_email'] = $user['email'];
            $_SESSION['admin_nombre'] = $user['nombre'];
            $_SESSION['login_time'] = time();
            
            // Redirigir al dashboard
            header('Location: admin/index.php');
            exit;
        } else {
            // Contraseña incorrecta
            $_SESSION['login_error'] = 'Email o contraseña incorrectos';
        }
    } else {
        // Usuario no encontrado
        $_SESSION['login_error'] = 'Email o contraseña incorrectos';
    }
    
    // Redirigir con error
    header('Location: index.php#loginModal');
    exit;
}

// Si no es POST, redirigir al index
header('Location: index.php');
exit;
?>

