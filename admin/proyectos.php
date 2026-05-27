<?php
/**
 * admin/proyectos.php
 * 
 * Gestion de proyectos del portafolio.
 * Tabla responsive con listado completo de proyectos,
 * botones de accion (ver/editar/eliminar) y formulario para agregar.
 */

$active_page = 'proyectos';

$projects = [
    ['id' => 1, 'title' => 'Sistema de Inventario',      'tech' => 'PHP, MySQL, Bootstrap, AJAX',   'status' => 'published', 'views' => 142, 'emoji' => '📦'],
    ['id' => 2, 'title' => 'Portafolio Autoadministrable','tech' => 'PHP, JavaScript, CSS, MySQL',   'status' => 'published', 'views' => 89,  'emoji' => '🌐'],
    ['id' => 3, 'title' => 'Blog Tecnologico CMS',       'tech' => 'PHP, AJAX, MySQL, Bootstrap',   'status' => 'draft',     'views' => 0,   'emoji' => '✍️'],
    ['id' => 4, 'title' => 'App de Encuestas Online',    'tech' => 'JavaScript, PHP, Bootstrap',    'status' => 'published', 'views' => 67,  'emoji' => '📊'],
    ['id' => 5, 'title' => 'E-Commerce Basico',          'tech' => 'PHP, MySQL, JavaScript',        'status' => 'draft',     'views' => 12,  'emoji' => '🛒'],
    ['id' => 6, 'title' => 'API REST de Tareas',         'tech' => 'PHP, MySQL, JSON',              'status' => 'published', 'views' => 34,  'emoji' => '🔌'],
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
            <h1 class="admin-topbar-title">Proyectos</h1>
            <p class="admin-topbar-subtitle">Gestion de proyectos del portafolio</p>
        </div>
        <div class="admin-topbar-user">
            <div class="admin-user-avatar">A</div>
            <span class="admin-user-name d-none d-sm-inline">Alfredo</span>
        </div>
    </header>
    
    <div class="admin-content">
        
        <!-- Tabla de proyectos -->
        <div class="admin-table-wrapper mb-4">
            <div class="admin-section-header px-3 pt-3">
                <div>
                    <h3 class="admin-section-title">Listado de Proyectos</h3>
                    <p class="admin-section-desc">Administra los proyectos mostrados en tu portafolio</p>
                </div>
                <button class="btn btn-sm btn-cyan" data-bs-toggle="collapse" data-bs-target="#formAddProject">
                    <i class="bi bi-plus-lg me-1"></i>Agregar Proyecto
                </button>
            </div>
            <div class="table-responsive">
                <table class="table admin-table">
                    <thead>
                        <tr>
                            <th style="width: 40px;"></th>
                            <th>Proyecto</th>
                            <th>Tecnologias</th>
                            <th>Estado</th>
                            <th>Visitas</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($projects as $project): 
                            $status_class = ($project['status'] === 'published') ? 'badge-published' : 'badge-draft';
                            $status_label = ($project['status'] === 'published') ? 'Publicado' : 'Borrador';
                        ?>
                        <tr>
                            <td class="cell-muted"><?php echo $project['emoji']; ?></td>
                            <td class="cell-title"><?php echo $project['title']; ?></td>
                            <td class="cell-muted"><?php echo $project['tech']; ?></td>
                            <td>
                                <span class="badge-status <?php echo $status_class; ?>"><?php echo $status_label; ?></span>
                            </td>
                            <td class="cell-muted"><?php echo $project['views']; ?></td>
                            <td class="text-end">
                                <div class="d-flex gap-1 justify-content-end">
                                    <button class="btn-action btn-action-view" title="Ver"><i class="bi bi-eye"></i></button>
                                    <button class="btn-action btn-action-edit" title="Editar"><i class="bi bi-pencil"></i></button>
                                    <button class="btn-action btn-action-delete btn-confirm-delete" title="Eliminar"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Formulario agregar proyecto -->
        <div class="collapse" id="formAddProject">
            <div class="admin-form-card p-4">
                <h3 class="admin-section-title mb-3">Agregar Nuevo Proyecto</h3>
                <form method="POST" action="">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label admin-form-label">Titulo del proyecto</label>
                            <input type="text" class="form-control admin-form-control" name="title" placeholder="Nombre del proyecto" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label admin-form-label">Tecnologias usadas</label>
                            <input type="text" class="form-control admin-form-control" name="tech" placeholder="PHP, MySQL, Bootstrap...">
                        </div>
                        <div class="col-12">
                            <label class="form-label admin-form-label">Descripcion</label>
                            <textarea class="form-control admin-form-control" name="description" rows="3" placeholder="Describe brevemente el proyecto..."></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label admin-form-label">URL Demo</label>
                            <input type="url" class="form-control admin-form-control" name="demo_url" placeholder="https://demo.ejemplo.com">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label admin-form-label">URL GitHub</label>
                            <input type="url" class="form-control admin-form-control" name="github_url" placeholder="https://github.com/usuario/repo">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-cyan">
                                <i class="bi bi-plus-lg me-1"></i>Agregar Proyecto
                            </button>
                            <button type="button" class="btn btn-outline-secondary ms-2" data-bs-toggle="collapse" data-bs-target="#formAddProject">
                                Cancelar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</main>

<?php include '../includes/admin-footer.php'; ?>
