<?php
/**
 * footer.php
 * 
 * Pie de pagina del portafolio.
 * Tres columnas: marca, navegacion, contacto + stack tecnico.
 */
?>
<footer class="footer-main">
    <div class="container pt-5 pb-4 max-w-6xl">
        <div class="row g-5 pb-4 mb-4 footer-row-border">
            <div class="col-md-4">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <i class="bi bi-code-square footer-brand-icon"></i>
                    <span class="footer-brand-text">Alfredo San Juan</span>
                </div>
                <p class="footer-desc">Estudiante Tecnico en Informatica apasionado por el desarrollo web moderno y la creacion de soluciones digitales de impacto.</p>
                <div class="d-flex gap-2 mt-4 footer-social">
                    <a href="#" title="GitHub"><i class="bi bi-github"></i></a>
                    <a href="#" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    <a href="#" title="Twitter"><i class="bi bi-twitter-x"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <h5 class="footer-heading mb-3">Navegacion</h5>
                <div class="d-flex flex-column gap-2">
                    <a href="#biografia" class="footer-link">Biografia</a>
                    <a href="#habilidades" class="footer-link">Habilidades</a>
                    <a href="#tecnologias" class="footer-link">Tecnologias</a>
                    <a href="#proyectos" class="footer-link">Proyectos</a>
                    <a href="#contacto" class="footer-link">Contacto</a>
                </div>
            </div>
            <div class="col-md-4">
                <h5 class="footer-heading mb-3">Contacto directo</h5>
                <a href="mailto:alfredo@sanjuan.dev" class="footer-link footer-email d-flex align-items-center gap-2 mb-4">
                    <i class="bi bi-envelope"></i>alfredo@sanjuan.dev
                </a>
                <div class="pt-3" style="border-top: 1px solid #0d2137;">
                    <p class="footer-stack-title mb-2">Stack utilizado en este portafolio</p>
                    <div class="d-flex flex-wrap gap-1">
                        <?php foreach (['PHP','MySQL','Bootstrap','JavaScript','CSS'] as $tech): ?>
                        <span class="footer-stack-tag"><?php echo $tech; ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-divider d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2">
            <span class="footer-copyright">&copy; 2026 Alfredo San Juan &mdash; Todos los derechos reservados</span>
            <span class="footer-credit d-flex align-items-center gap-1">
                Portafolio Profesional <i class="bi bi-heart-fill"></i>
            </span>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
