<?php
/**
 * includes/auth.php
 * 
 * Protección de rutas administrativas.
 * Inicia sesión, verifica autenticación, redirige al login si es necesario.
 * 
 * Uso: include '../includes/auth.php'; al inicio de páginas admin
 */

// Iniciar sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario está autenticado
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    // Redirigir al index (donde está el modal de login)
    header('Location: ../index.php');
    exit;
}
?>
