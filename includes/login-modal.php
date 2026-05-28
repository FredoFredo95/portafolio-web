<?php
/**
 * login-modal.php
 * 
 * Modal de inicio de sesion.
 * Header oscuro, formulario de login con email y password.
 */
?>
<div class="modal fade modal-login" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
        <div class="modal-content">
            <div class="modal-header modal-login-header flex-column text-center pb-4 position-relative">
                <div class="d-flex justify-content-center mb-3">
                    <div class="modal-login-logo">
                        <i class="bi bi-code-square"></i>
                    </div>
                </div>
                <h5 class="modal-title modal-login-title" id="loginModalLabel">Panel de Administracion</h5>
                <p class="modal-login-subtitle mb-0">Alfredo San Juan — Acceso exclusivo</p>
                <button type="button" class="btn-close modal-login-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-login-body">
                <div class="d-flex align-items-center gap-2 login-security mb-3">
                    <i class="bi bi-shield-check"></i>
                    <span>Zona segura — Solo administradores autorizados</span>
                </div>
                <form id="loginForm" action="process-login.php" method="POST">
                    <div class="mb-3">
                        <label for="login-email" class="form-label login-label">Correo Electronico</label>
                        <div class="login-input-icon">
                            <i class="bi bi-envelope"></i>
                            <input type="email" class="form-control" id="login-email" name="email" placeholder="admin@sanjuan.dev" required>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="login-password" class="form-label login-label">Contraseña</label>
                        <div class="login-input-icon">
                            <i class="bi bi-lock"></i>
                            <input type="password" class="form-control" id="login-password" name="password" placeholder="........" required>
                        </div>
                    </div>
                    <div class="text-end mb-3">
                        <a href="#" class="login-forgot">¿Olvidaste tu contraseña?</a>
                    </div>
                    <button type="submit" class="btn btn-navy w-100">Iniciar Sesion</button>
                    <p class="text-center mt-3 mb-0 login-note">Solo para uso administrativo autorizado</p>
                </form>
            </div>
        </div>
    </div>
</div>
