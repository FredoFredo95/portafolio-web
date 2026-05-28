<?php
/**
 * contact.php
 * 
 * Seccion de Contacto.
 * Dos columnas: info de contacto + formulario.
 * Guarda mensajes en MySQL.
 */

require_once __DIR__ . '/../config/database.php';
include 'handlers/messages.php';

$success_message = '';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $messagesHandler = new MessagesHandler($mysqli);
    
    $data = [
        'nombre' => trim($_POST['nombre'] ?? ''),
        'email' => trim($_POST['email'] ?? ''),
        'asunto' => trim($_POST['asunto'] ?? ''),
        'mensaje' => trim($_POST['mensaje'] ?? '')
    ];
    
    if (empty($data['nombre']) || empty($data['email']) || empty($data['asunto']) || empty($data['mensaje'])) {
        $error_message = 'Por favor, completa todos los campos.';
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $error_message = 'Por favor, ingresa un email válido.';
    } else {
        if ($messagesHandler->create($data)) {
            $success_message = '¡Mensaje enviado! Te responderé pronto.';
        } else {
            $error_message = 'Error al enviar el mensaje. Intenta de nuevo.';
        }
    }
}
?>
<section id="contacto" class="py-5 bg-white">
    <div class="container py-4 max-w-6xl">
        <div class="section-header">
            <span class="section-tag">CONTACTO</span>
            <h2 class="section-title">¿Hablamos?</h2>
            <p class="section-desc">¿Tienes un proyecto en mente? Estoy disponible para freelance, practicas o colaboraciones. Escribeme.</p>
            <div class="section-line"></div>
        </div>
        <div class="row g-5 max-w-5xl mx-auto">
            <div class="col-lg-4">
                <h4 class="mb-4 text-navy fs-6 fw-semibold">Informacion de contacto</h4>
                <div class="d-flex flex-column gap-4 mb-4">
                    <div class="d-flex align-items-center gap-3">
                        <div class="contact-info-icon contact-icon-email"><i class="bi bi-envelope"></i></div>
                        <div><div class="contact-label">Correo electronico</div><div class="contact-value">alfredo@sanjuan.dev</div></div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="contact-info-icon contact-icon-geo"><i class="bi bi-geo-alt"></i></div>
                        <div><div class="contact-label">Ubicacion</div><div class="contact-value">Chile</div></div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="contact-info-icon contact-icon-phone"><i class="bi bi-telephone"></i></div>
                        <div><div class="contact-label">Telefono</div><div class="contact-value">+569 XXXX XXXX</div></div>
                    </div>
                </div>
                <div class="pt-4 mb-4 contact-divider">
                    <p class="contact-label mb-2">Encuentrame en redes sociales</p>
                    <div class="d-flex gap-2 contact-social">
                        <a href="#" title="GitHub"><i class="bi bi-github"></i></a>
                        <a href="#" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
                        <a href="#" title="Twitter"><i class="bi bi-twitter-x"></i></a>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3 contact-available">
                    <div class="rounded-circle dot"></div>
                    <div>
                        <div class="contact-available title">Disponible para proyectos</div>
                        <div class="contact-available subtitle">Respondo en menos de 24hs</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm contact-card">
                    <div class="card-body p-4 p-md-5">
                        <?php if ($success_message): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i><?php echo htmlspecialchars($success_message); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($error_message): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-circle me-2"></i><?php echo htmlspecialchars($error_message); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        <?php endif; ?>
                        
                        <form id="contactForm" method="POST" action="">
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="contact-name" class="form-label contact-form-label">Nombre completo</label>
                                    <input type="text" class="form-control" id="contact-name" name="nombre" placeholder="Tu nombre" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="contact-email" class="form-label contact-form-label">Correo electronico</label>
                                    <input type="email" class="form-control" id="contact-email" name="email" placeholder="tu@correo.com" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="contact-subject" class="form-label contact-form-label">Asunto</label>
                                <input type="text" class="form-control" id="contact-subject" name="asunto" placeholder="De que se trata tu consulta?" required>
                            </div>
                            <div class="mb-4">
                                <label for="contact-message" class="form-label contact-form-label">Mensaje</label>
                                <textarea class="form-control" id="contact-message" name="mensaje" rows="5" placeholder="Escribe tu mensaje aqui. Cuéntame sobre tu proyecto, idea o consulta..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-navy w-100 d-flex align-items-center justify-content-center gap-2">
                                <i class="bi bi-send fs-8"></i>Enviar Mensaje
                            </button>
                            <p class="text-center mt-3 mb-0 contact-form-note">No comparto tu informacion con terceros. Respondo personalmente cada mensaje.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
