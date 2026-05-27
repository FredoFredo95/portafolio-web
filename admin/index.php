<?php
/**
 * admin/index.php
 * 
 * Panel de Administración (Dashboard).
 * 
 * Estructura base preparada para la fase de backend.
 * Por ahora muestra un layout de placeholder indicando que el
 * dashboard se implementará con el sistema de login y CRUD.
 * 
 * Funcionalidades previstas:
 * - Verificación de sesión PHP (protección de acceso)
 * - Resumen estadístico (proyectos, tecnologías, visitas)
 * - CRUD de biografía
 * - CRUD de habilidades
 * - CRUD de tecnologías
 * - CRUD de proyectos
 * - Gestión de mensajes de contacto
 */

// Incluir cabecera
include '../includes/header.php';

// Incluir navbar
include '../includes/navbar.php';
?>

<section class="min-vh-100 d-flex align-items-center justify-content-center pt-5" 
         style="background-color: #f1f5f9;">
    <div class="container text-center py-5" style="max-width: 600px;">
        
        <!-- Icono -->
        <div class="d-inline-flex align-items-center justify-content-center rounded-4 mb-4"
             style="width: 80px; height: 80px; background: linear-gradient(135deg, #06b6d4, #3b82f6);">
            <i class="bi bi-shield-lock text-white" style="font-size: 2.2rem;"></i>
        </div>

        <!-- Título -->
        <h2 style="color: #0d2137; font-weight: 600; margin-bottom: 0.75rem;">
            Panel de Administraci&oacute;n
        </h2>
        <p style="color: #64748b; font-size: 0.9rem; line-height: 1.7; margin-bottom: 2rem;">
            Esta secci&oacute;n est&aacute; preparada para el dashboard administrativo con CRUD.
            <br>Se activar&aacute; en la fase de implementaci&oacute;n del backend.
        </p>

        <!-- Lista de funcionalidades previstas -->
        <div class="card border-0 shadow-sm text-start mx-auto mb-4" 
             style="border-color: #e2e8f0 !important; max-width: 450px;">
            <div class="card-body p-4">
                <h5 style="color: #0d2137; font-size: 0.9rem; font-weight: 600; margin-bottom: 1rem;">
                    Funcionalidades planificadas:
                </h5>
                <ul class="list-unstyled mb-0">
                    <?php 
                    $features = [
                        'Login con sesiones PHP',
                        'Gestión de biografía',
                        'CRUD de habilidades',
                        'CRUD de tecnologías',
                        'CRUD de proyectos',
                        'Gestión de mensajes de contacto',
                        'Estadísticas de visitas'
                    ];
                    foreach ($features as $feature):
                    ?>
                    <li class="d-flex align-items-center gap-2 mb-2" style="color: #374151; font-size: 0.85rem;">
                        <i class="bi bi-check-circle" style="color: #22c55e; font-size: 0.85rem;"></i>
                        <?php echo $feature; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!-- Botón volver -->
        <a href="../index.php" class="btn d-inline-flex align-items-center gap-2"
           style="background-color: #06b6d4; color: white; font-size: 0.88rem; padding: 0.5rem 1.2rem;">
            <i class="bi bi-arrow-left" style="font-size: 0.8rem;"></i>
            Volver al Portafolio
        </a>
    </div>
</section>

<?php
// Incluir footer
include '../includes/footer.php';
?>
