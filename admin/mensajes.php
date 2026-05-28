<?php
/**
 * admin/mensajes.php
 * 
 * Gestion de mensajes de contacto recibidos desde MySQL.
 */

// Proteger ruta - verificar autenticación
include '../includes/auth.php';

require_once __DIR__ . '/../config/database.php';
include '../handlers/messages.php';

$active_page = 'mensajes';

$messagesHandler = new MessagesHandler($mysqli);

// Procesar acciones
$success_message = '';
$error_message = '';

// Eliminar
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    if ($messagesHandler->delete((int)$_GET['delete'])) {
        $success_message = 'Mensaje eliminado correctamente.';
    } else {
        $error_message = 'Error al eliminar el mensaje.';
    }
}

// Marcar como leído
if (isset($_GET['read']) && is_numeric($_GET['read'])) {
    if ($messagesHandler->markAsRead((int)$_GET['read'])) {
        $success_message = 'Mensaje marcado como leído.';
    } else {
        $error_message = 'Error al procesar el mensaje.';
    }
}

$messages = $messagesHandler->getAll();
$unread_count = $messagesHandler->countNew();

include '../includes/admin-header.php';
include '../includes/admin-sidebar.php';
?>

<main class="admin-main">
    
    <header class="admin-topbar">
        <button class="admin-sidebar-toggle" onclick="toggleSidebar()" aria-label="Toggle sidebar">
            <i class="bi bi-list"></i>
        </button>
        <div>
            <h1 class="admin-topbar-title">Mensajes de Contacto</h1>
            <p class="admin-topbar-subtitle">Gestiona los mensajes recibidos desde el formulario de contacto</p>
        </div>
        <div class="admin-topbar-user">
            <div class="admin-user-avatar"><?php echo substr($_SESSION['admin_nombre'], 0, 1); ?></div>
            <span class="admin-user-name d-none d-sm-inline"><?php echo htmlspecialchars($_SESSION['admin_nombre']); ?></span>
        </div>
    </header>
    
    <div class="admin-content">
        
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
        
        <!-- Tabla de mensajes -->
        <div class="admin-table-wrapper">
            <div class="admin-section-header px-3 pt-3">
                <div>
                    <h3 class="admin-section-title">Bandeja de Entrada</h3>
                    <p class="admin-section-desc">Total: <?php echo count($messages); ?> | Nuevos: <?php echo $unread_count; ?></p>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table admin-table">
                    <thead>
                        <tr>
                            <th style="width: 30px;"></th>
                            <th>Remitente</th>
                            <th>Email</th>
                            <th>Asunto</th>
                            <th>Fecha</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($messages)): foreach ($messages as $msg): ?>
                        <tr <?php echo !$msg['leido'] ? 'style="background-color: rgba(6, 182, 212, 0.05);"' : ''; ?>>
                            <td class="text-center">
                                <?php if (!$msg['leido']): ?>
                                <i class="bi bi-envelope-fill text-cyan"></i>
                                <?php else: ?>
                                <i class="bi bi-envelope-open text-gray-400"></i>
                                <?php endif; ?>
                            </td>
                            <td class="cell-title"><?php echo htmlspecialchars($msg['nombre']); ?></td>
                            <td class="cell-muted"><a href="mailto:<?php echo htmlspecialchars($msg['email']); ?>"><?php echo htmlspecialchars($msg['email']); ?></a></td>
                            <td class="cell-muted"><?php echo htmlspecialchars($msg['asunto']); ?></td>
                            <td class="cell-muted"><?php echo date('d/m/Y H:i', strtotime($msg['created_at'])); ?></td>
                            <td class="text-end">
                                <div class="d-flex gap-1 justify-content-end">
                                    <button class="btn-action btn-action-view" title="Ver mensaje" data-bs-toggle="modal" data-bs-target="#msgModal<?php echo $msg['id']; ?>"><i class="bi bi-eye"></i></button>
                                    <?php if (!$msg['leido']): ?>
                                    <a href="mensajes.php?read=<?php echo $msg['id']; ?>" class="btn-action" title="Marcar como leído"><i class="bi bi-check"></i></a>
                                    <?php endif; ?>
                                    <a href="mensajes.php?delete=<?php echo $msg['id']; ?>" class="btn-action btn-action-delete" title="Eliminar" onclick="return confirm('¿Eliminar este mensaje?')"><i class="bi bi-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">No hay mensajes</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</main>

<!-- Modales para ver mensajes -->
<?php foreach ($messages as $msg): ?>
<div class="modal fade" id="msgModal<?php echo $msg['id']; ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content modal-login">
            <div class="modal-header" style="border-bottom: 1px solid #e2e8f0;">
                <h5 class="modal-title text-navy"><?php echo htmlspecialchars($msg['asunto']); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="admin-user-avatar" style="width: 44px; height: 44px; font-size: 1rem;">
                        <?php echo substr($msg['nombre'], 0, 1); ?>
                    </div>
                    <div>
                        <div class="fw-semibold text-navy"><?php echo htmlspecialchars($msg['nombre']); ?></div>
                        <div class="fs-7 text-gray-500"><?php echo htmlspecialchars($msg['email']); ?> &middot; <?php echo date('d/m/Y H:i', strtotime($msg['created_at'])); ?></div>
                    </div>
                </div>
                <hr class="my-3" style="border-color: #e2e8f0;">
                <p class="mb-0" style="color: #374151; font-size: 0.9rem; line-height: 1.7; white-space: pre-wrap;"><?php echo htmlspecialchars($msg['mensaje']); ?></p>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #e2e8f0;">
                <a href="mailto:<?php echo htmlspecialchars($msg['email']); ?>?subject=Re: <?php echo urlencode($msg['asunto']); ?>" class="btn btn-cyan">
                    <i class="bi bi-reply me-1"></i>Responder
                </a>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php include '../includes/admin-footer.php'; ?>
