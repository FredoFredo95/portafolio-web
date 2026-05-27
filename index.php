<?php
/**
 * index.php
 * 
 * Página principal del portafolio web profesional.
 * Ensambla todos los componentes mediante includes PHP reutilizables.
 * 
 * Estructura de la página:
 * 1. header.php     → HTML base, metas, CSS (Bootstrap 5.3 + custom)
 * 2. navbar.php     → Barra de navegación fija responsive
 * 3. hero.php       → Sección biografía con gradiente oscuro
 * 4. skills.php     → Grid de habilidades y herramientas
 * 5. technologies.php → Barras de progreso de tecnologías dominadas
 * 6. projects.php   → Grid de proyectos realizados
 * 7. contact.php    → Formulario de contacto + info
 * 8. login-modal.php → Modal de inicio de sesión
 * 9. footer.php     → Pie de página + scripts JS
 * 
 * NOTA: Por ahora todos los datos son estáticos (arrays PHP).
 * En la fase de backend se conectará con MySQL para datos dinámicos.
 */

// Incluir cabecera HTML
include 'includes/header.php';

// Incluir barra de navegación
include 'includes/navbar.php';
?>

<!-- Contenido principal -->
<main>
    <?php
    // Sección 1: Biografía / Hero
    include 'includes/hero.php';

    // Sección 2: Habilidades
    include 'includes/skills.php';

    // Sección 3: Tecnologías dominadas
    include 'includes/technologies.php';

    // Sección 4: Proyectos
    include 'includes/projects.php';

    // Sección 5: Contacto
    include 'includes/contact.php';
    ?>
</main>

<?php
// Modal de login (invisible hasta que se activa)
include 'includes/login-modal.php';

// Pie de página + cierre HTML
include 'includes/footer.php';
?>
