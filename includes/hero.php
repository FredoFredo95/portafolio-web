<?php
/**
 * hero.php
 * 
 * Sección de Biografía Profesional (Hero).
 * - Fondo con gradiente oscuro (de #051525 a #0a3060)
 * - Dos columnas: texto izquierda + avatar derecha
 * - Badge "Disponible para proyectos"
 * - Nombre grande en blanco y cyan
 * - Título profesional, ubicación, descripción
 * - Botones CTA: Ver Proyectos y Contactar
 * - Stats rápidos: proyectos, tecnologías, años formación
 * - Avatar circular con anillo degradado e indicadores flotantes
 */
?>
<section id="biografia" class="d-flex align-items-center pt-5">
    <div class="container py-5" style="max-width: 1200px;">
        <div class="row g-5 align-items-center">
            
            <!-- Columna de texto (izquierda en desktop) -->
            <div class="col-lg-7 order-2 order-lg-1 text-center text-lg-start">
                
                <!-- Badge de disponibilidad -->
                <span class="hero-badge">
                    <i class="bi bi-circle-fill"></i>
                    Disponible para proyectos
                </span>

                <!-- Nombre -->
                <h1 class="hero-name-main">
                    Alfredo
                </h1>
                <h1 class="hero-name-accent">
                    San Juan
                </h1>

                <!-- Título profesional -->
                <h3 class="hero-title">
                    Estudiante T&eacute;cnico en Inform&aacute;tica
                </h3>

                <!-- Ubicación -->
                <div class="hero-location text-lg-start">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>Chile</span>
                </div>

                <!-- Descripción -->
                <p class="hero-description">
                    Apasionado por el desarrollo web moderno, con experiencia en PHP, MySQL, 
                    JavaScript y Bootstrap. Comprometido con crear soluciones digitales limpias, 
                    funcionales y de alto impacto profesional.
                </p>

                <!-- Botones CTA -->
                <div class="hero-buttons">
                    <a href="#proyectos" class="btn hero-btn hero-btn-primary">
                        <i class="bi bi-folder"></i>
                        Ver Proyectos
                    </a>
                    <a href="#contacto" class="btn hero-btn hero-btn-outline">
                        <i class="bi bi-envelope"></i>
                        Contactar
                    </a>
                </div>

                <!-- Stats rápidos -->
                <div class="hero-stats">
                    <div class="hero-stat">
                        <div class="hero-stat-value">12+</div>
                        <div class="hero-stat-label">Proyectos</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-value">7+</div>
                        <div class="hero-stat-label">Tecnolog&iacute;as</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-value">3</div>
                        <div class="hero-stat-label">A&ntilde;os formaci&oacute;n</div>
                    </div>
                </div>
            </div>

            <!-- Columna de avatar (derecha en desktop) -->
            <div class="col-lg-5 order-1 order-lg-2 d-flex justify-content-center">
                <div class="position-relative d-inline-block">
                    <!-- Anillo exterior degradado -->
                    <div class="avatar-ring-outer">
                        <!-- Círculo interior -->
                        <div class="avatar-ring-inner">
                            <!-- Avatar con iniciales -->
                            <div class="avatar-circle">
                                <span class="avatar-initials">ASJ</span>
                            </div>
                        </div>
                    </div>

                    <!-- Indicador online -->
                    <div class="avatar-online-indicator">
                        <div class="avatar-online-dot"></div>
                    </div>

                    <!-- Badge flotante superior -->
                    <div class="avatar-badge-top">
                        Estudiante
                    </div>

                    <!-- Badge flotante inferior -->
                    <div class="avatar-badge-bottom">
                        MySQL / Bootstrap
                    </div>
                </div>
            </div>
        </div>

        <!-- Flecha scroll down -->
        <div class="text-center mt-5 pt-3">
            <a href="#habilidades" class="hero-scroll-arrow">
                <i class="bi bi-chevron-down"></i>
            </a>
        </div>
    </div>
</section>
