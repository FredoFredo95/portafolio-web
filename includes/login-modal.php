<?php
/**
 * login-modal.php
 * 
 * Modal de inicio de sesión (Bootstrap Modal).
 * - Header oscuro con gradiente, logo/icono y título
 * - Cuerpo blanco con formulario de login
 * - Campos: email y contraseña con iconos
 * - Aviso de seguridad (zona segura)
 * - Botón de inicio de sesión
 * - Link de recuperar contraseña (decorativo por ahora)
 */
?>
<!-- Modal de Login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
        <div class="modal-content border-0 overflow-hidden">
            
            <!-- Header oscuro -->
            <div class="modal-header-custom">
                
                <!-- Logo/icono -->
                <div class="modal-icon-container">
                    <i class="bi bi-code-square"></i>
                </div>

                <h5 class="modal-title-custom" id="loginModalLabel">
                    Panel de Administraci&oacute;n
                </h5>
                <p class="modal-subtitle">
                    Alfredo San Juan &mdash; Acceso exclusivo
                </p>

                <!-- Botón cerrar -->
                <button type="button" class="btn-close modal-close-btn" 
                        data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Cuerpo del formulario -->
            <div class="modal-body px-4 py-4" style="background-color: white;">
                
                <!-- Aviso de seguridad -->
                <div class="modal-security-notice">
                    <i class="bi bi-shield-check modal-security-icon"></i>
                    <span class="modal-security-text">
                        Zona segura &mdash; Solo administradores autorizados
                    </span>
                </div>

                <form id="loginForm" action="" method="POST">
                    <!-- Email -->
                    <div class="modal-form-group">
                        <label for="login-email" class="modal-form-label">
                            Correo Electr&oacute;nico
                        </label>
                        <div class="position-relative">
                            <i class="bi bi-envelope modal-form-icon"></i>
                            <input type="email" class="form-control modal-form-input" id="login-email" name="email"
                                   placeholder="admin@sanjuan.dev" required>
                        </div>
                    </div>

                    <!-- Contraseña -->
                    <div class="modal-form-group">
                        <label for="login-password" class="modal-form-label">
                            Contrase&ntilde;a
                        </label>
                        <div class="position-relative">
                            <i class="bi bi-lock modal-form-icon"></i>
                            <input type="password" class="form-control modal-form-input" id="login-password" name="password"
                                   placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" required>
                        </div>
                    </div>

                    <!-- Olvidé contraseña -->
                    <div class="modal-forgot-password">
                        <a href="#">
                            &iquest;Olvidaste tu contrase&ntilde;a?
                        </a>
                    </div>

                    <!-- Botón submit -->
                    <button type="submit" class="btn modal-submit-btn">
                        Iniciar Sesi&oacute;n
                    </button>

                    <p class="modal-info-notice">
                        Solo para uso administrativo autorizado
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
