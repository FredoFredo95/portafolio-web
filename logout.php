<?php
/**
 * logout.php
 * 
 * Destruye la sesión del usuario y redirige al index.
 */

// Iniciar sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Destruir todas las variables de sesión
session_destroy();

// Redirigir al index
header('Location: index.php');
exit;
?>
