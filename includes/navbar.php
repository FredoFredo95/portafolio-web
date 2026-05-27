<?php
/**
 * navbar.php
 * 
 * Barra de navegacion fija responsive.
 * Logo, links de navegacion y boton de login.
 */
?>
<nav id="mainNavbar" class="navbar navbar-expand-md fixed-top shadow-sm navbar-landing">
    <div class="container max-w-6xl">
        <a class="navbar-brand d-flex align-items-center gap-2" href="#">
            <i class="bi bi-code-square brand-icon"></i>
            <span class="brand-text">Alfredo San Juan</span>
        </a>
        <button class="navbar-toggler navbar-toggler-landing" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mx-auto mb-2 mb-md-0 gap-md-1">
                <li class="nav-item"><a class="nav-link" href="#biografia">Biografia</a></li>
                <li class="nav-item"><a class="nav-link" href="#habilidades">Habilidades</a></li>
                <li class="nav-item"><a class="nav-link" href="#tecnologias">Tecnologias</a></li>
                <li class="nav-item"><a class="nav-link" href="#proyectos">Proyectos</a></li>
                <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
            </ul>
            <div class="d-flex">
                <button class="btn btn-sm btn-login d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                    <i class="bi bi-box-arrow-in-right fs-8"></i>
                    Iniciar Sesion
                </button>
            </div>
        </div>
    </div>
</nav>
