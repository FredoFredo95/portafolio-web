<?php
/**
 * admin/mensajes.php
 * 
 * Gestion de mensajes recibidos desde el formulario de contacto.
 * Tabla con remitente, asunto, fecha y estado de lectura.
 */

$active_page = 'mensajes';

$messages = [
    ['id' => 1, 'name' => 'Maria Gonzalez',    'email' => 'maria@ejemplo.com',       'subject' => 'Consulta proyecto web',         'message' => 'Hola, me gustaria saber si estas disponible para un proyecto de desarrollo web para mi empresa.',             'date' => '2026-05-27', 'read' => false],
    ['id' => 2, 'name' => 'Carlos Mendez',     'email' => 'cmendez@empresa.cl',      'subject' => 'Propuesta de colaboracion',     'message' => 'Tenemos una propuesta de colaboracion para un proyecto universitario. Podriamos conversar?',                   'date' => '2026-05-26', 'read' => false],
    ['id' => 3, 'name' => 'Ana Rodriguez',     'email' => 'ana.r@startup.io',        'subject' => 'Practicas profesionales',       'message' => 'Estamos buscando estudiantes para practicas en desarrollo web. Te interesa conocer nuestra propuesta?',        'date' => '2026-05-25', 'read' => true],
    ['id' => 4, 'name' => 'Pedro Soto',        'email' => 'psoto@gmail.com',         'subject' => 'Duda sobre tecnologia',         'message' => 'Veo que usas Bootstrap en tus proyectos. Estarias dispuesto a migrar un proyecto a Tailwind CSS?',             'date' => '2026-05-20', 'read' => true],
    ['id' => 5, 'name' => 'Lucia Fernandez',   'email' => 'lucia.f@corporacion.cl',  'subject' => 'Sistema de inventario',         'message' => 'Me intereso tu proyecto de sistema de inventario. Podrias contactarme para saber mas detalles.',               'date' => '2026-05-18', 'read' => true],
];

include '../includes/admin-header.php';
include '../includes/admin-sidebar.php';
?>

<main class="admin-main">
    
    <header class="admin-topbar">
        <button class="admin-sidebar-toggle" onclick="toggleSidebar()" aria-label="Toggle sidebar">
            <i class="bi bi-list"></i>
        </button>
        <div>
            <h1 class="admin-topbar-title">Mensajes</h1>
            <p class="admin-topbar-subtitle">Mensajes recibidos desde el formulario de contacto</p>
        </div>
        <div class="admin-topbar-user">
            <div class="admin-user-avatar">A</div>
            <span class="admin-user-name d-none d-sm-inline">Alfredo</span>
        </div>
    </header>
    
    <div class="admin-content">
        
        <div class="admin-section-header">
            <div>
                <h3 class="admin-section-title">Bandeja de Entrada</h3>
                <p class="admin-section-desc">
                    <?php 
                    $unread = count(array_filter($messages, fn($m) => !$m['read']));
                    echo $unread > 0 ? "Tienes {$unread} mensaje(s) sin leer" : 'No tienes mensajes nuevos';
                    ?>
                </p>
            </div>
        </div>
        
        <!-- Tabla de mensajes -->
        <div class="admin-table-wrapper">
            <div class="table-responsive">
                <table class="table admin-table">
                    <thead>
                        <tr>
                            <th style="width: 30px;"></th>
                            <th>Remitente</th>
                            <th>Asunto</th>
                            <th>Fecha</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($messages as $msg): 
                            $row_class = !$msg['read'] ? 'fw-semibold' : '';
                            $icon_class = !$msg['read'] ? 'bi-envelope-fill text-cyan' : 'bi-envelope-open text-gray-400';
                        ?>
                        <tr class="<?php echo $row_class; ?>">
                            <td><i class="bi <?php echo $icon_class; ?>"></i></td>
                            <td>
                                <div class="cell-title"><?php echo $msg['name']; ?></div>
                                <div class="cell-muted fs-7"><?php echo $msg['email']; ?></div>
                            </td>
                            <td>
                                <div class="cell-title"><?php echo $msg['subject']; ?></div>
                                <div class="cell-muted fs-7 text-truncate" style="max-width: 300px;"><?php echo $msg['message']; ?></div>
                            </td>
                            <td class="cell-muted"><?php echo $msg['date']; ?></td>
                            <td class="text-end">
                                <div class="d-flex gap-1 justify-content-end">
                                    <button class="btn-action btn-action-view" title="Ver" data-bs-toggle="modal" data-bs-target="#msgModal<?php echo $msg['id']; ?>">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn-action btn-action-delete btn-confirm-delete" title="Eliminar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
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
                <h5 class="modal-title text-navy"><?php echo $msg['subject']; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="admin-user-avatar" style="width: 44px; height: 44px; font-size: 1rem;">
                        <?php echo substr($msg['name'], 0, 1); ?>
                    </div>
                    <div>
                        <div class="fw-semibold text-navy"><?php echo $msg['name']; ?></div>
                        <div class="fs-7 text-gray-500"><?php echo $msg['email']; ?> &middot; <?php echo $msg['date']; ?></div>
                    </div>
                </div>
                <hr class="my-3" style="border-color: #e2e8f0;">
                <p class="mb-0" style="color: #374151; font-size: 0.9rem; line-height: 1.7;"><?php echo $msg['message']; ?></p>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #e2e8f0;">
                <a href="mailto:<?php echo $msg['email']; ?>?subject=Re: <?php echo $msg['subject']; ?>" class="btn btn-cyan">
                    <i class="bi bi-reply me-1"></i>Responder
                </a>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php include '../includes/admin-footer.php'; ?>
