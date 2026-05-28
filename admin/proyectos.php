<?php
/**
 * admin/proyectos.php
 * 
 * Gestion de proyectos del portafolio.
 * CRUD completo con MySQL.
 */

// Proteger ruta - verificar autenticación
include '../includes/auth.php';

require_once __DIR__ . '/../config/database.php';
include '../handlers/projects.php';

$active_page = 'proyectos';

$projectsHandler = new ProjectsHandler($mysqli);

// Procesar acciones
$success_message = '';
$error_message = '';

// Eliminar
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    if ($projectsHandler->delete((int)$_GET['delete'])) {
        $success_message = 'Proyecto eliminado correctamente.';
    } else {
        $error_message = 'Error al eliminar el proyecto.';
    }
}

// Crear/Actualizar
$form_data = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'titulo' => trim($_POST['title'] ?? ''),
        'descripcion' => trim($_POST['description'] ?? ''),
        'tecnologias' => trim($_POST['tech'] ?? ''),
        'emoji' => trim($_POST['emoji'] ?? '📁'),
        'url_demo' => trim($_POST['demo_url'] ?? '#'),
        'url_github' => trim($_POST['github_url'] ?? '#'),
        'gradiente' => trim($_POST['gradiente'] ?? 'grad-inventario'),
        'estado' => trim($_POST['estado'] ?? 'draft'),
        'destacado' => isset($_POST['destacado']) ? 1 : 0,
    ];
    
    if (empty($data['titulo']) || empty($data['descripcion'])) {
        $error_message = 'El título y descripción son requeridos.';
    } else {
        if (isset($_POST['id']) && is_numeric($_POST['id'])) {
            if ($projectsHandler->update((int)$_POST['id'], $data)) {
                $success_message = 'Proyecto actualizado correctamente.';
            } else {
                $error_message = 'Error al actualizar el proyecto.';
            }
        } else {
            if ($projectsHandler->create($data)) {
                $success_message = 'Proyecto creado correctamente.';
            } else {
                $error_message = 'Error al crear el proyecto.';
            }
        }
    }
}

// Cargar datos para edición si se especifica
if (isset($_GET['edit']) && is_numeric($_GET['edit'])) {
    $form_data = $projectsHandler->getById((int)$_GET['edit']);
}

$projects = $projectsHandler->getAll();

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
                        <?php if (!empty($projects)): foreach ($projects as $project): 
                            $status_class = ($project['estado'] === 'published') ? 'badge-published' : 'badge-draft';
                            $status_label = ($project['estado'] === 'published') ? 'Publicado' : 'Borrador';
                        ?>
                        <tr>
                            <td class="cell-muted"><?php echo htmlspecialchars($project['emoji']); ?></td>
                            <td class="cell-title"><?php echo htmlspecialchars($project['titulo']); ?></td>
                            <td class="cell-muted"><?php echo htmlspecialchars($project['tecnologias']); ?></td>
                            <td>
                                <span class="badge-status <?php echo $status_class; ?>"><?php echo $status_label; ?></span>
                            </td>
                            <td class="cell-muted"><?php echo $project['visitas']; ?></td>
                            <td class="text-end">
                                <div class="d-flex gap-1 justify-content-end">
                                    <button class="btn-action btn-action-view" title="Ver" onclick="window.open('<?php echo htmlspecialchars($project['url_demo']); ?>', '_blank')"><i class="bi bi-eye"></i></button>
                                    <button class="btn-action btn-action-edit" title="Editar" onclick="window.location.href='proyectos.php?edit=<?php echo $project['id']; ?>'"><i class="bi bi-pencil"></i></button>
                                    <button class="btn-action btn-action-delete btn-confirm-delete" title="Eliminar" onclick="if(confirm('¿Eliminar este proyecto?')) window.location.href='proyectos.php?delete=<?php echo $project['id']; ?>'"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-3 text-muted">No hay proyectos. <a href="#" onclick="document.getElementById('formAddProject').classList.add('show')">Crear uno nuevo</a></td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Formulario agregar proyecto -->
        <div class="collapse" id="formAddProject">
            <div class="admin-form-card p-4">
                <h3 class="admin-section-title mb-3"><?php echo $form_data ? 'Editar Proyecto' : 'Agregar Nuevo Proyecto'; ?></h3>
                <form method="POST" action="">
                    <?php if ($form_data): ?>
                    <input type="hidden" name="id" value="<?php echo $form_data['id']; ?>">
                    <?php endif; ?>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label admin-form-label">Titulo del proyecto</label>
                            <input type="text" class="form-control admin-form-control" name="title" placeholder="Nombre del proyecto" value="<?php echo $form_data ? htmlspecialchars($form_data['titulo']) : ''; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label admin-form-label">Emoji</label>
                            <input type="text" class="form-control admin-form-control" name="emoji" placeholder="📁" maxlength="2" value="<?php echo $form_data ? htmlspecialchars($form_data['emoji']) : '📁'; ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label admin-form-label">Tecnologias usadas</label>
                            <input type="text" class="form-control admin-form-control" name="tech" placeholder="PHP, MySQL, Bootstrap..." value="<?php echo $form_data ? htmlspecialchars($form_data['tecnologias']) : ''; ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label admin-form-label">Descripcion</label>
                            <textarea class="form-control admin-form-control" name="description" rows="3" placeholder="Describe brevemente el proyecto..." required><?php echo $form_data ? htmlspecialchars($form_data['descripcion']) : ''; ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label admin-form-label">URL Demo</label>
                            <input type="url" class="form-control admin-form-control" name="demo_url" placeholder="https://demo.ejemplo.com" value="<?php echo $form_data ? htmlspecialchars($form_data['url_demo']) : ''; ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label admin-form-label">URL GitHub</label>
                            <input type="url" class="form-control admin-form-control" name="github_url" placeholder="https://github.com/usuario/repo" value="<?php echo $form_data ? htmlspecialchars($form_data['url_github']) : ''; ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label admin-form-label">Estado</label>
                            <select class="form-control admin-form-control" name="estado">
                                <option value="draft" <?php echo ($form_data && $form_data['estado'] === 'draft') ? 'selected' : ''; ?>>Borrador</option>
                                <option value="published" <?php echo ($form_data && $form_data['estado'] === 'published') ? 'selected' : ''; ?>>Publicado</option>
                                <option value="archived" <?php echo ($form_data && $form_data['estado'] === 'archived') ? 'selected' : ''; ?>>Archivado</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-check-label admin-form-label d-block">
                                <input type="checkbox" class="form-check-input" name="destacado" <?php echo ($form_data && $form_data['destacado']) ? 'checked' : ''; ?>> Destacado
                            </label>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-cyan">
                                <i class="bi bi-plus-lg me-1"></i><?php echo $form_data ? 'Actualizar Proyecto' : 'Agregar Proyecto'; ?>
                            </button>
                            <button type="button" class="btn btn-outline-secondary ms-2" data-bs-toggle="collapse" data-bs-target="#formAddProject">
                                Cancelar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <?php if ($form_data): ?>
        <script>
            document.getElementById('formAddProject').classList.add('show');
        </script>
        <?php endif; ?>
        
    </div>
</main>

<?php include '../includes/admin-footer.php'; ?>
