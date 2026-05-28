<?php
/**
 * hero.php
 * 
 * Seccion de Biografia Profesional (Hero).
 * Gradient oscuro, datos personales, avatar circular y stats.
 * Carga desde MySQL.
 */

require_once __DIR__ . '/../config/database.php';
include 'handlers/biography.php';

$bioHandler = new BiographyHandler($mysqli);
$bio = $bioHandler->get();
?>
<section id="biografia" class="d-flex align-items-center section-hero">
    <div class="container py-5 max-w-6xl">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7 order-2 order-lg-1 text-center text-lg-start">
                <span class="badge rounded-pill hero-badge mb-4 px-3 py-2">
                    <i class="bi bi-circle-fill dot me-1"></i>
                    <?php echo $bio['disponible'] ? 'Disponible para proyectos' : 'No disponible'; ?>
                </span>
                <h1 class="hero-title mb-1"><?php echo htmlspecialchars($bio['nombre']); ?></h1>
                <h1 class="hero-title-accent mb-3"><?php echo htmlspecialchars($bio['apellido']); ?></h1>
                <h3 class="hero-subtitle mb-3"><?php echo htmlspecialchars($bio['titulo']); ?></h3>
                <div class="hero-location d-flex align-items-center gap-2 mb-3 justify-content-center justify-content-lg-start">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span><?php echo htmlspecialchars($bio['ubicacion']); ?></span>
                </div>
                <p class="hero-description mb-4 mx-auto mx-lg-0">
                    <?php echo htmlspecialchars($bio['descripcion']); ?>
                </p>
                <div class="d-flex gap-3 flex-wrap justify-content-center justify-content-lg-start mb-5">
                    <a href="#proyectos" class="btn btn-cyan d-flex align-items-center gap-2">
                        <i class="bi bi-folder"></i>Ver Proyectos
                    </a>
                    <a href="#contacto" class="btn btn-outline-blue d-flex align-items-center gap-2">
                        <i class="bi bi-envelope"></i>Contactar
                    </a>
                </div>
                <div class="d-flex gap-4 gap-md-5 justify-content-center justify-content-lg-start">
                    <div class="text-center">
                        <div class="hero-stat-value">12+</div>
                        <div class="hero-stat-label">Proyectos</div>
                    </div>
                    <div class="text-center">
                        <div class="hero-stat-value">7+</div>
                        <div class="hero-stat-label">Tecnologias</div>
                    </div>
                    <div class="text-center">
                        <div class="hero-stat-value">3</div>
                        <div class="hero-stat-label">Anos formacion</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 order-1 order-lg-2 d-flex justify-content-center">
                <div class="position-relative d-inline-block">
                    <div class="rounded-circle d-flex align-items-center justify-content-center avatar-ring">
                        <div class="rounded-circle w-100 h-100 d-flex align-items-center justify-content-center avatar-inner">
                            <div class="rounded-circle d-flex align-items-center justify-content-center avatar-face">
                                <span class="avatar-text user-select-none"><?php echo substr($bio['nombre'], 0, 1); ?><?php echo substr($bio['apellido'], 0, 1); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute rounded-circle d-flex align-items-center justify-content-center avatar-online">
                        <div class="rounded-circle avatar-online-dot"></div>
                    </div>
                    <div class="position-absolute px-3 py-2 rounded-3 shadow avatar-badge-top"><?php echo htmlspecialchars($bio['titulo']); ?></div>
                    <div class="position-absolute px-3 py-2 rounded-3 shadow avatar-badge-bottom">MySQL / Bootstrap</div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5 pt-3">
            <a href="#habilidades" class="d-inline-block hero-scroll">
                <i class="bi bi-chevron-down" style="font-size: 1.8rem;"></i>
            </a>
        </div>
    </div>
</section>
