<?php
/**
 * config/database.php
 * 
 * Configuración de conexión a base de datos MySQL.
 * 
 * Este archivo prepara la conexión usando mysqli (extensión MySQL mejorada de PHP).
 * Por ahora está desactivado ya que no hay backend implementado todavía.
 * 
 * En la siguiente fase se activará con:
 * - Host del servidor (local o producción)
 * - Nombre de la base de datos
 * - Usuario y contraseña
 * - Charset UTF-8
 * 
 * Tablas previstas:
 * - usuarios      (login administrativo)
 * - biografia     (información personal)
 * - habilidades   (skills y herramientas)
 * - tecnologias   (tecnologías con nivel de dominio)
 * - proyectos     (proyectos realizados)
 * - mensajes      (mensajes del formulario de contacto)
 */

// Parámetros de conexión (comentados hasta activar backend)
/*
define('DB_HOST', 'localhost');
define('DB_NAME', 'portafolio_db');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// Crear conexión con mysqli
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Verificar conexión
if ($conn->connect_error) {
    die('Error de conexión a la base de datos: ' . $conn->connect_error);
}

// Establecer charset
$conn->set_charset(DB_CHARSET);
*/

// Por ahora, variable de conexión nula
$conn = null;
?>
