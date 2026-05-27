<?php
/**
 * footer.php
 * 
 * Pie de página (Footer).
 * - Fondo oscuro (#051525) coherente con el navbar
 * - 3 columnas: Marca personal + navegación + contacto directo
 * - Iconos de redes sociales (GitHub, LinkedIn, Twitter)
 * - Stack técnico utilizado (badges de tecnologías)
 * - Barra inferior con copyright y créditos
 * - Links de navegación con scroll suave
 */
?>
<footer>
    <div class="container pt-5 pb-4" style="max-width: 1200px;">
        
        <!-- Grid principal -->
        <div class="row g-5 pb-4 footer-divider">
            
            <!-- Columna 1: Marca -->
            <div class="col-md-4">
                <div class="footer-brand">
                    <i class="bi bi-code-square"></i>
                    <span>Alfredo San Juan</span>
                </div>
                <p class="footer-description">
                    Estudiante T&eacute;cnico en Inform&aacute;tica apasionado por el desarrollo web 
                    moderno y la creaci&oacute;n de soluciones digitales de impacto.
                </p>
                <!-- Redes sociales -->
                <div class="footer-socials">
                    <a href="#" class="footer-social-link" title="GitHub">
                        <i class="bi bi-github"></i>
                    </a>
                    <a href="#" class="footer-social-link" title="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="#" class="footer-social-link" title="Twitter">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                </div>
            </div>

            <!-- Columna 2: Navegación -->
            <div class="col-md-4">
                <h5 class="footer-section-title">Navegaci&oacute;n</h5>
                <div class="footer-nav-links">
                    <?php
                    $navLinks = ['Biograf&iacute;a', 'Habilidades', 'Tecnolog&iacute;as', 'Proyectos', 'Contacto'];
                    foreach ($navLinks as $link):
                        $href = strtolower(str_replace(['&iacute;', '&eacute;', '&oacute;', '&uacute;', '&aacute;', '&ntilde;'], 
                                                        ['i', 'e', 'o', 'u', 'a', 'n'], $link));
                    ?>
                    <a href="#<?php echo $href; ?>" class="nav-footer-link">
                        <?php echo $link; ?>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Columna 3: Contacto directo + Stack -->
            <div class="col-md-4">
                <h5 class="footer-section-title">Contacto directo</h5>
                <a href="mailto:alfredo@sanjuan.dev" class="footer-contact-link">
                    <i class="bi bi-envelope footer-contact-icon"></i>
                    alfredo@sanjuan.dev
                </a>

                <!-- Stack técnico -->
                <div class="contact-divider" style="border-top: 1px solid #0d2137;">
                    <p class="footer-stack-label">
                        Stack utilizado en este portafolio
                    </p>
                    <div class="footer-stack">
                        <?php 
                        $stack = ['PHP', 'MySQL', 'Bootstrap', 'JavaScript', 'CSS'];
                        foreach ($stack as $tech):
                        ?>
                        <span class="footer-stack-badge">
                            <?php echo $tech; ?>
                        </span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Barra inferior -->
        <div class="footer-bottom">
            <span class="footer-copyright">
                &copy; 2026 Alfredo San Juan &mdash; Todos los derechos reservados
            </span>
            <span class="footer-credit">
                Portafolio Profesional
                <i class="bi bi-heart-fill"></i>
            </span>
        </div>
    </div>
</footer>

<!-- Cierre del body y html (se cierran aquí para que todas las páginas terminen correctamente) -->
<!-- Bootstrap 5.3 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript personalizado -->
<script src="assets/js/main.js"></script>

</body>
</html>
