<?php
/**
 * header.php
 * 
 * Componente reutilizable que genera la cabecera HTML de todas las páginas.
 * Incluye: meta tags, título, Bootstrap 5.3 CSS, Bootstrap Icons, fuentes y CSS personalizado.
 * 
 * Uso: include 'includes/header.php'; al inicio de cada archivo PHP.
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portafolio web profesional de Alfredo San Juan - Desarrollador Web">
    <meta name="author" content="Alfredo San Juan">
    <meta name="keywords" content="portafolio, desarrollo web, PHP, MySQL, Bootstrap, JavaScript">
    <title>Portafolio | Alfredo San Juan</title>

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Google Fonts - Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body data-bs-spy="scroll" data-bs-target="#mainNavbar" data-bs-offset="80">
