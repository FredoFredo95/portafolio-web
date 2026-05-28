<?php
/**
 * admin/tecnologias.php
 * 
 * Gestion de tecnologias dominadas.
 * CRUD con barras de progreso editables.
 */

// Proteger ruta - verificar autenticación
include '../includes/auth.php';

require_once __DIR__ . '/../config/database.php';
include '../handlers/technologies.php';

$active_page = 'tecnologias';

$technologiesHandler = new TechnologiesHandler($mysqli);

// Procesar acciones
$success_message = '';
$error_message = '';
$form_data = null;

// Eliminar
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    if ($technologiesHandler->delete((int)$_GET['delete'])) {
        $success_message = 'Tecnología eliminada correctamente.';
    } else {
        $error_message = 'Error al eliminar la tecnología.';
    }
}

// Crear/Actualizar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'nombre' => trim($_POST['name'] ?? ''),
        'icono' => trim($_POST['icon'] ?? ''),
        'descripcion' => trim($_POST['desc'] ?? ''),
        'nivel' => (int)($_POST['level'] ?? 5),
        'experiencia_anos' => (float)($_POST['experiencia'] ?? 0),
    ];
    
    if (empty($data['nombre'])) {
        $error_message = 'El nombre es requerido.';
    } else {
        if (isset($_POST['id']) && is_numeric($_POST['id'])) {
            if ($technologiesHandler->update((int)$_POST['id'], $data)) {
                $success_message = 'Tecnología actualizada correctamente.';
            } else {
                $error_message = 'Error al actualizar la tecnología.';
            }
        } else {
            if ($technologiesHandler->create($data)) {
                $success_message = 'Tecnología creada correctamente.';
            } else {
                $error_message = 'Error al crear la tecnología.';
            }
        }
    }
}

// Cargar datos para edición si se especifica
if (isset($_GET['edit']) && is_numeric($_GET['edit'])) {
    $form_data = $technologiesHandler->getById((int)$_GET['edit']);
}

$technologies = $technologiesHandler->getAll();

include '../includes/admin-header.php';
include '../includes/admin-sidebar.php';
?>

<main class="admin-main">
    
    <header class="admin-topbar">
        <button class="admin-sidebar-toggle" onclick="toggleSidebar()" aria-label="Toggle sidebar">
            <i class="bi bi-list"></i>
        </button>
        <div>
            <h1 class="admin-topbar-title">Tecnologias</h1>
            <p class="admin-topbar-subtitle">Administra el nivel de dominio por tecnologia</p>
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
                <h3 class="admin-section-title">Tecnologias y Nivel de Dominio</h3>
                <p class="admin-section-desc">Ajusta el porcentaje de dominio para cada tecnologia</p>
            </div>
            <button class="btn btn-sm btn-cyan" data-bs-toggle="collapse" data-bs-target="#formAddTech">
                <i class="bi bi-plus-lg me-1"></i>Agregar Tecnologia
            </button>
        </div>
        
        <!-- Formulario agregar -->
        <div class="collapse mb-4" id="formAddTech">
            <div class="admin-form-card p-4">
                <h3 class="admin-section-title mb-3"><?php echo $form_data ? 'Editar Tecnologia' : 'Agregar Tecnologia'; ?></h3>
                <form method="POST" action="" class="row g-3">
                    <?php if ($form_data): ?>
                    <input type="hidden" name="id" value="<?php echo $form_data['id']; ?>">
                    <?php endif; ?>
                    <div class="col-md-6">
                        <label class="form-label admin-form-label">Nombre</label>
                        <input type="text" class="form-control admin-form-control" name="name" placeholder="Ej: Python" value="<?php echo $form_data ? htmlspecialchars($form_data['nombre']) : ''; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label admin-form-label">Icono (emoji)</label>
                        <input type="text" class="form-control admin-form-control" name="icon" placeholder="Ej: 🐍" maxlength="10" value="<?php echo $form_data ? htmlspecialchars($form_data['icono']) : ''; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label admin-form-label">Nivel (1-10)</label>
                        <input type="number" class="form-control admin-form-control" name="level" min="1" max="10" value="<?php echo $form_data ? $form_data['nivel'] : '5'; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label admin-form-label">Años de experiencia</label>
                        <input type="number" class="form-control admin-form-control" name="experiencia" min="0" step="0.5" value="<?php echo $form_data ? $form_data['experiencia_anos'] : '1'; ?>">
                    </div>
                    <div class="col-12">
                        <label class="form-label admin-form-label">Descripcion</label>
                        <input type="text" class="form-control admin-form-control" name="desc" placeholder="Breve descripcion..." value="<?php echo $form_data ? htmlspecialchars($form_data['descripcion']) : ''; ?>">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-cyan"><i class="bi bi-plus-lg me-1"></i><?php echo $form_data ? 'Actualizar' : 'Agregar'; ?></button>
                        <button type="button" class="btn btn-outline-secondary ms-2" data-bs-toggle="collapse" data-bs-target="#formAddTech">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
        
        <?php if ($form_data): ?>
        <script>
            document.getElementById('formAddTech').classList.add('show');
        </script>
        <?php endif; ?>
        
        <!-- Tabla de tecnologias -->
        <div class="admin-table-wrapper">
            <div class="table-responsive">
                <table class="table admin-table">
                    <thead>
                        <tr>
                            <th>Tecnologia</th>
                            <th>Nivel</th>
                            <th>Barra de progreso</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($technologies)): foreach ($technologies as $tech): ?>
                        <tr>
                            <td class="cell-title"><?php echo htmlspecialchars($tech['icono']); ?> <?php echo htmlspecialchars($tech['nombre']); ?></td>
                            <td class="text-cyan fw-semibold"><?php echo ($tech['nivel'] * 10); ?>%</td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="admin-tech-bar">
                                        <div class="admin-tech-fill" style="width: <?php echo ($tech['nivel'] * 10); ?>%; background-color: #06b6d4;"></div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end">
                                <div class="d-flex gap-1 justify-content-end">
                                    <button class="btn-action btn-action-edit" title="Editar" onclick="window.location.href='tecnologias.php?edit=<?php echo $tech['id']; ?>'"><i class="bi bi-pencil"></i></button>
                                    <button class="btn-action btn-action-delete btn-confirm-delete" title="Eliminar" onclick="if(confirm('¿Eliminar esta tecnología?')) window.location.href='tecnologias.php?delete=<?php echo $tech['id']; ?>'"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr>
                            <td colspan="4" class="text-center py-3 text-muted">No hay tecnologías. <a href="#" onclick="document.getElementById('formAddTech').classList.add('show')">Crear una nueva</a></td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</main>

<?php include '../includes/admin-footer.php'; ?>
