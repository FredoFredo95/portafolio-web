<?php
/**
 * admin/habilidades.php
 * 
 * Gestion de habilidades y herramientas.
 * CRUD completo con MySQL.
 */

// Proteger ruta - verificar autenticación
include '../includes/auth.php';

require_once __DIR__ . '/../config/database.php';
include '../handlers/skills.php';

$active_page = 'habilidades';

$skillsHandler = new SkillsHandler($mysqli);

// Procesar acciones
$success_message = '';
$error_message = '';
$form_data = null;

// Eliminar
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    if ($skillsHandler->delete((int)$_GET['delete'])) {
        $success_message = 'Habilidad eliminada correctamente.';
    } else {
        $error_message = 'Error al eliminar la habilidad.';
    }
}

// Crear/Actualizar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'nombre' => trim($_POST['name'] ?? ''),
        'icono' => trim($_POST['icon'] ?? ''),
        'descripcion' => trim($_POST['desc'] ?? ''),
        'nivel' => (int)($_POST['nivel'] ?? 5),
    ];
    
    if (empty($data['nombre']) || empty($data['descripcion'])) {
        $error_message = 'El nombre y descripción son requeridos.';
    } else {
        if (isset($_POST['id']) && is_numeric($_POST['id'])) {
            if ($skillsHandler->update((int)$_POST['id'], $data)) {
                $success_message = 'Habilidad actualizada correctamente.';
            } else {
                $error_message = 'Error al actualizar la habilidad.';
            }
        } else {
            if ($skillsHandler->create($data)) {
                $success_message = 'Habilidad creada correctamente.';
            } else {
                $error_message = 'Error al crear la habilidad.';
            }
        }
    }
}

// Cargar datos para edición si se especifica
if (isset($_GET['edit']) && is_numeric($_GET['edit'])) {
    $form_data = $skillsHandler->getById((int)$_GET['edit']);
}

$skills = $skillsHandler->getAll();

include '../includes/admin-header.php';
include '../includes/admin-sidebar.php';
?>

<main class="admin-main">
    
    <header class="admin-topbar">
        <button class="admin-sidebar-toggle" onclick="toggleSidebar()" aria-label="Toggle sidebar">
            <i class="bi bi-list"></i>
        </button>
        <div>
            <h1 class="admin-topbar-title">Habilidades</h1>
            <p class="admin-topbar-subtitle">Gestion de habilidades y herramientas</p>
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
        
        <div class="admin-section-header">
            <div>
                <h3 class="admin-section-title">Habilidades Registradas</h3>
                <p class="admin-section-desc">Gestiona las habilidades mostradas en tu portafolio</p>
            </div>
            <button class="btn btn-sm btn-cyan" data-bs-toggle="collapse" data-bs-target="#formAddSkill">
                <i class="bi bi-plus-lg me-1"></i>Agregar Habilidad
            </button>
        </div>
        
        <!-- Formulario agregar -->
        <div class="collapse mb-4" id="formAddSkill">
            <div class="admin-form-card p-4">
                <h3 class="admin-section-title mb-3"><?php echo $form_data ? 'Editar Habilidad' : 'Agregar Habilidad'; ?></h3>
                <form method="POST" action="" class="row g-3">
                    <?php if ($form_data): ?>
                    <input type="hidden" name="id" value="<?php echo $form_data['id']; ?>">
                    <?php endif; ?>
                    <div class="col-md-4">
                        <label class="form-label admin-form-label">Nombre</label>
                        <input type="text" class="form-control admin-form-control" name="name" placeholder="Ej: React" value="<?php echo $form_data ? htmlspecialchars($form_data['nombre']) : ''; ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label admin-form-label">Icono (emoji)</label>
                        <input type="text" class="form-control admin-form-control" name="icon" placeholder="Ej: ⚛️" maxlength="10" value="<?php echo $form_data ? htmlspecialchars($form_data['icono']) : ''; ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label admin-form-label">Nivel (1-10)</label>
                        <input type="number" class="form-control admin-form-control" name="nivel" min="1" max="10" value="<?php echo $form_data ? $form_data['nivel'] : '5'; ?>">
                    </div>
                    <div class="col-12">
                        <label class="form-label admin-form-label">Descripcion</label>
                        <input type="text" class="form-control admin-form-control" name="desc" placeholder="Breve descripcion de la habilidad..." value="<?php echo $form_data ? htmlspecialchars($form_data['descripcion']) : ''; ?>" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-cyan"><i class="bi bi-plus-lg me-1"></i><?php echo $form_data ? 'Actualizar' : 'Agregar'; ?></button>
                        <button type="button" class="btn btn-outline-secondary ms-2" data-bs-toggle="collapse" data-bs-target="#formAddSkill">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
        
        <?php if ($form_data): ?>
        <script>
            document.getElementById('formAddSkill').classList.add('show');
        </script>
        <?php endif; ?>
        
        <!-- Grid de habilidades -->
        <div class="row g-3">
            <?php if (!empty($skills)): foreach ($skills as $skill): ?>
            <div class="col-md-6 col-lg-4">
                <div class="admin-skill-card">
                    <span class="admin-skill-icon"><?php echo htmlspecialchars($skill['icono']); ?></span>
                    <div class="admin-skill-info">
                        <div class="admin-skill-name"><?php echo htmlspecialchars($skill['nombre']); ?></div>
                        <div class="admin-skill-desc"><?php echo htmlspecialchars($skill['descripcion']); ?></div>
                        <div class="text-muted small mt-1">Nivel: <?php echo $skill['nivel']; ?>/10</div>
                    </div>
                    <div class="admin-skill-actions">
                        <button class="btn-action btn-action-edit" title="Editar" onclick="window.location.href='habilidades.php?edit=<?php echo $skill['id']; ?>'"><i class="bi bi-pencil"></i></button>
                        <button class="btn-action btn-action-delete btn-confirm-delete" title="Eliminar" onclick="if(confirm('¿Eliminar esta habilidad?')) window.location.href='habilidades.php?delete=<?php echo $skill['id']; ?>'"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            </div>
            <?php endforeach; else: ?>
            <div class="col-12 text-center py-5">
                <p class="text-muted">No hay habilidades. <a href="#" onclick="document.getElementById('formAddSkill').classList.add('show')">Crear una nueva</a></p>
            </div>
            <?php endif; ?>
        </div>
        
    </div>
</main>

<?php include '../includes/admin-footer.php'; ?>
