<?php
/**
 * navbar.php
 * 
 * Barra de navegación fija responsive.
 * - Fondo oscuro (#0d2137) con sombra sutil
 * - Logo con icono de código + nombre
 * - Links de navegación: Biografía, Habilidades, Tecnologías, Proyectos, Contacto
 * - Botón de inicio de sesión (abre modal)
 * - Menú hamburguesa para móvil
 * 
 * Se marca como activo según el scroll usando Bootstrap ScrollSpy.
 */
?>
<nav id="mainNavbar" class="navbar navbar-expand-md fixed-top shadow-sm">
    <div class="container" style="max-width: 1200px;">
        <!-- Logo / Marca personal -->
        <a class="navbar-brand" href="#">
            <i class="bi bi-code-square"></i>
            <span>Alfredo San Juan</span>
        </a>

        <!-- Botón hamburguesa para móvil -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" 
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
        </button>

        <!-- Links de navegación -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mx-auto mb-2 mb-md-0 gap-md-1">
                <li class="nav-item">
                    <a class="nav-link" href="#biografia">
                        Biograf&iacute;a
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#habilidades">
                        Habilidades
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tecnologias">
                        Tecnolog&iacute;as
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#proyectos">
                        Proyectos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contacto">
                        Contacto
                    </a>
                </li>
            </ul>

            <!-- Botón Login -->
            <div class="d-flex">
                <button class="btn btn-login" 
                        data-bs-toggle="modal" data-bs-target="#loginModal">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Iniciar Sesi&oacute;n
                </button>
            </div>
        </div>
    </div>
</nav>
