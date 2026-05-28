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

// Parámetros de conexión
// Definir constantes solo si no existen


if (!defined('DB_HOST'))     define('DB_HOST', 'localhost');
if (!defined('DB_NAME'))     define('DB_NAME', 'portfolio_db');
if (!defined('DB_USER'))     define('DB_USER', 'root');
if (!defined('DB_PASS'))     define('DB_PASS', '');
if (!defined('DB_CHARSET'))  define('DB_CHARSET', 'utf8mb4');

// Crear conexión mysqli orientada a objetos y reutilizable
if (!isset($mysqli) || !($mysqli instanceof mysqli)) {
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($mysqli->connect_error) {
        die('Error de conexión a la base de datos: ' . $mysqli->connect_error);
    }
    $mysqli->set_charset(DB_CHARSET);
}

?>
