<?php
/**
 * admin/index.php
 * 
 * Dashboard principal del panel de administracion.
 * Muestra: bienvenida, estadisticas, proyectos recientes,
 * acciones rapidas y estado del sistema.
 */

$active_page = 'dashboard';

// Datos de ejemplo (estaticos - se reemplazaran con MySQL en fase backend)
$stats = [
    ['label' => 'Total Proyectos',    'value' => '12', 'icon' => 'bi-folder',       'color' => 'stat-icon-blue',   'change' => '+2 este mes'],
    ['label' => 'Habilidades',        'value' => '8',  'icon' => 'bi-tools',        'color' => 'stat-icon-purple', 'change' => 'Actualizado'],
    ['label' => 'Tecnologias',        'value' => '7',  'icon' => 'bi-cpu',          'color' => 'stat-icon-cyan',   'change' => 'Actualizado'],
    ['label' => 'Mensajes Nuevos',    'value' => '3',  'icon' => 'bi-envelope',     'color' => 'stat-icon-green',  'change' => '+1 nuevo'],
];

$recent_projects = [
    ['id' => 1, 'title' => 'Sistema de Inventario',   'tech' => 'PHP, MySQL, Bootstrap',  'status' => 'published', 'views' => 142],
    ['id' => 2, 'title' => 'Portafolio Personal',      'tech' => 'PHP, JS, CSS',           'status' => 'published', 'views' => 89],
    ['id' => 3, 'title' => 'Blog Tecnologico CMS',     'tech' => 'PHP, AJAX, MySQL',       'status' => 'draft',     'views' => 0],
    ['id' => 4, 'title' => 'App de Encuestas',         'tech' => 'JS, PHP, Bootstrap',     'status' => 'published', 'views' => 67],
];

$quick_actions = [
    ['label' => 'Agregar nuevo proyecto',   'icon' => 'bi-folder-plus',    'url' => 'proyectos.php'],
    ['label' => 'Actualizar biografia',     'icon' => 'bi-person',         'url' => 'biografia.php'],
    ['label' => 'Editar habilidades',       'icon' => 'bi-tools',          'url' => 'habilidades.php'],
    ['label' => 'Actualizar tecnologias',   'icon' => 'bi-cpu',            'url' => 'tecnologias.php'],
];

$system_status = [
    ['label' => 'Base de datos MySQL',  'status' => 'Conectada',       'ok' => true],
    ['label' => 'Sesion activa',        'status' => 'Activa',          'ok' => true],
    ['label' => 'Ultimo acceso',        'status' => 'Hoy 10:32 AM',    'ok' => true],
    ['label' => 'Modo mantenimiento',   'status' => 'Desactivado',     'ok' => true],
    ['label' => 'Version PHP',          'status' => '8.2.x',           'ok' => true],
];

include '../includes/admin-header.php';
include '../includes/admin-sidebar.php';
?>

<!-- Main area -->
<main class="admin-main">
    
    <!-- Topbar -->
    <header class="admin-topbar">
        <button class="admin-sidebar-toggle" onclick="toggleSidebar()" aria-label="Toggle sidebar">
            <i class="bi bi-list"></i>
        </button>
        <div>
            <h1 class="admin-topbar-title">Dashboard</h1>
            <p class="admin-topbar-subtitle">Portafolio Profesional - Panel de Administracion</p>
        </div>
        <div class="admin-topbar-user">
            <div class="admin-user-avatar">A</div>
            <span class="admin-user-name d-none d-sm-inline">Alfredo</span>
        </div>
    </header>
    
    <!-- Content -->
    <div class="admin-content">
        
        <!-- Welcome -->
        <div class="admin-welcome">
            <h2>Bienvenido, Alfredo</h2>
            <p>Aqui puedes gestionar todo el contenido de tu portafolio web profesional.</p>
        </div>
        
        <!-- Stat Cards -->
        <div class="row g-4 mb-4">
            <?php foreach ($stats as $stat): ?>
            <div class="col-6 col-lg-3">
                <div class="admin-stat-card">
                    <div class="admin-stat-icon <?php echo $stat['color']; ?>">
                        <i class="bi <?php echo $stat['icon']; ?>"></i>
                    </div>
                    <div class="admin-stat-value text-navy"><?php echo $stat['value']; ?></div>
                    <div class="admin-stat-label"><?php echo $stat['label']; ?></div>
                    <div class="admin-stat-change"><?php echo $stat['change']; ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="row g-4">
            
            <!-- Proyectos Recientes -->
            <div class="col-lg-8">
                <div class="admin-table-wrapper">
                    <div class="admin-section-header px-3 pt-3">
                        <div>
                            <h3 class="admin-section-title">Proyectos Recientes</h3>
                        </div>
                        <a href="proyectos.php" class="btn btn-sm btn-cyan">
                            <i class="bi bi-plus-lg me-1"></i>Nuevo Proyecto
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table admin-table">
                            <thead>
                                <tr>
                                    <th>Proyecto</th>
                                    <th>Tecnologias</th>
                                    <th>Estado</th>
                                    <th>Visitas</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recent_projects as $project): 
                                    $status_class = ($project['status'] === 'published') ? 'badge-published' : 'badge-draft';
                                    $status_label = ($project['status'] === 'published') ? 'Publicado' : 'Borrador';
                                ?>
                                <tr>
                                    <td class="cell-title"><?php echo $project['title']; ?></td>
                                    <td class="cell-muted"><?php echo $project['tech']; ?></td>
                                    <td>
                                        <span class="badge-status <?php echo $status_class; ?>">
                                            <?php echo $status_label; ?>
                                        </span>
                                    </td>
                                    <td class="cell-muted"><?php echo $project['views']; ?></td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <button class="btn-action btn-action-view" title="Ver">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <button class="btn-action btn-action-edit" title="Editar">
                                                <i class="bi bi-pencil"></i>
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
            
            <!-- Sidebar widgets -->
            <div class="col-lg-4">
                
                <!-- Acciones Rapidas -->
                <div class="admin-form-card p-3 mb-4">
                    <h3 class="admin-section-title mb-3">Acciones Rapidas</h3>
                    <div class="d-flex flex-column gap-2">
                        <?php foreach ($quick_actions as $action): ?>
                        <a href="<?php echo $action['url']; ?>" class="admin-action-btn">
                            <i class="bi <?php echo $action['icon']; ?>"></i>
                            <span><?php echo $action['label']; ?></span>
                            <i class="bi bi-chevron-right arrow"></i>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Estado del Sistema -->
                <div class="admin-form-card p-3">
                    <h3 class="admin-section-title mb-3">Estado del Sistema</h3>
                    <div>
                        <?php foreach ($system_status as $item): 
                            $dot_class = $item['ok'] ? 'status-online' : 'status-offline';
                        ?>
                        <div class="admin-status-item">
                            <span class="admin-status-label"><?php echo $item['label']; ?></span>
                            <div class="d-flex align-items-center gap-2">
                                <span class="admin-status-dot <?php echo $dot_class; ?>"></span>
                                <span class="admin-status-value"><?php echo $item['status']; ?></span>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div><!-- /.admin-content -->
    
</main><!-- /.admin-main -->

<?php include '../includes/admin-footer.php'; ?>
