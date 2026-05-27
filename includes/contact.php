<?php
/**
 * contact.php
 * 
 * Sección de Contacto.
 * - Layout de dos columnas: info de contacto (izq) + formulario (der)
 * - Info: email, ubicación, teléfono, redes sociales, badge disponible
 * - Formulario: nombre, email, asunto, mensaje, botón enviar
 * - Diseño limpio con cards y separadores sutiles
 */
?>
<section id="contacto" class="py-5" style="background-color: #ffffff;">
    <div class="container py-4" style="max-width: 1200px;">
        
        <!-- Header de sección -->
        <div class="text-center mb-5">
            <span class="section-label">CONTACTO</span>
            <h2 class="section-title">&iquest;Hablamos?</h2>
            <p class="section-description">
                &iquest;Tienes un proyecto en mente? Estoy disponible para freelance, pr&aacute;cticas o colaboraciones. Escr&iacute;beme.
            </p>
            <div class="section-divider"></div>
        </div>

        <!-- Layout dos columnas -->
        <div class="row g-5" style="max-width: 1000px; margin-left: auto; margin-right: auto;">
            
            <!-- Columna izquierda: Info de contacto -->
            <div class="col-lg-4">
                <h4 class="contact-info-title">
                    Informaci&oacute;n de contacto
                </h4>

                <!-- Items de contacto -->
                <div class="d-flex flex-column gap-4 mb-4">
                    <!-- Email -->
                    <div class="contact-item">
                        <div class="contact-icon-container" style="background-color: rgba(6,182,212,0.07); border-color: rgba(6,182,212,0.15);">
                            <i class="bi bi-envelope" style="color: #06b6d4;"></i>
                        </div>
                        <div>
                            <div class="contact-label">Correo electr&oacute;nico</div>
                            <div class="contact-value">alfredo@sanjuan.dev</div>
                        </div>
                    </div>

                    <!-- Ubicación -->
                    <div class="contact-item">
                        <div class="contact-icon-container" style="background-color: rgba(59,130,246,0.07); border-color: rgba(59,130,246,0.15);">
                            <i class="bi bi-geo-alt" style="color: #3b82f6;"></i>
                        </div>
                        <div>
                            <div class="contact-label">Ubicaci&oacute;n</div>
                            <div class="contact-value">Chile</div>
                        </div>
                    </div>

                    <!-- Teléfono -->
                    <div class="contact-item">
                        <div class="contact-icon-container" style="background-color: rgba(139,92,246,0.07); border-color: rgba(139,92,246,0.15);">
                            <i class="bi bi-telephone" style="color: #8b5cf6;"></i>
                        </div>
                        <div>
                            <div class="contact-label">Tel&eacute;fono</div>
                            <div class="contact-value">+569 XXXX XXXX</div>
                        </div>
                    </div>
                </div>

                <!-- Redes sociales -->
                <div class="contact-divider">
                    <p style="color: #94a3b8; font-size: 0.78rem; margin-bottom: 0.75rem;">
                        Encu&eacute;ntrame en redes sociales
                    </p>
                    <div class="contact-socials">
                        <a href="#" class="social-link" title="GitHub">
                            <i class="bi bi-github"></i>
                        </a>
                        <a href="#" class="social-link" title="LinkedIn">
                            <i class="bi bi-linkedin"></i>
                        </a>
                        <a href="#" class="social-link" title="Twitter">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                    </div>
                </div>

                <!-- Badge disponibilidad -->
                <div class="contact-availability">
                    <div class="availability-dot"></div>
                    <div>
                        <div class="availability-text">
                            Disponible para proyectos
                        </div>
                        <div class="availability-subtext">
                            Respondo en menos de 24hs
                        </div>
                    </div>
                </div>
            </div>

            <!-- Columna derecha: Formulario -->
            <div class="col-lg-8">
                <div class="card border-0 contact-form-card">
                    <div class="card-body p-4 p-md-5">
                        <form id="contactForm" action="" method="POST">
                            <!-- Fila 1: Nombre + Email -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="contact-name" class="form-label">
                                        Nombre completo
                                    </label>
                                    <input type="text" class="form-control" id="contact-name" name="nombre" 
                                           placeholder="Tu nombre" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="contact-email" class="form-label">
                                        Correo electr&oacute;nico
                                    </label>
                                    <input type="email" class="form-control" id="contact-email" name="email" 
                                           placeholder="tu@correo.com" required>
                                </div>
                            </div>

                            <!-- Asunto -->
                            <div class="mb-3">
                                <label for="contact-subject" class="form-label">
                                    Asunto
                                </label>
                                <input type="text" class="form-control" id="contact-subject" name="asunto" 
                                       placeholder="&iquest;De qu&eacute; se trata tu consulta?" required>
                            </div>

                            <!-- Mensaje -->
                            <div class="mb-4">
                                <label for="contact-message" class="form-label">
                                    Mensaje
                                </label>
                                <textarea class="form-control" id="contact-message" name="mensaje" rows="5" 
                                          placeholder="Escribe tu mensaje aqu&iacute;. Cu&eacute;ntame sobre tu proyecto, idea o consulta..." 
                                          required style="resize: none;"></textarea>
                            </div>

                            <!-- Botón enviar -->
                            <button type="submit" class="btn form-submit-btn">
                                <i class="bi bi-send"></i>
                                Enviar Mensaje
                            </button>

                            <p class="form-notice">
                                No comparto tu informaci&oacute;n con terceros. Respondo personalmente cada mensaje.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
