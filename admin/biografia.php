<?php
/**
 * admin/biografia.php
 * 
 * Edicion de la informacion biografica y de perfil desde MySQL.
 */

// Proteger ruta - verificar autenticación
include '../includes/auth.php';

require_once __DIR__ . '/../config/database.php';
include '../handlers/biography.php';

$active_page = 'biografia';

$bioHandler = new BiographyHandler($mysqli);
$bio = $bioHandler->get();

// Procesar actualización
$success_message = '';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'nombre' => trim($_POST['nombre'] ?? ''),
        'apellido' => trim($_POST['apellido'] ?? ''),
        'titulo' => trim($_POST['titulo'] ?? ''),
        'descripcion' => trim($_POST['descripcion'] ?? ''),
        'ubicacion' => trim($_POST['ubicacion'] ?? ''),
        'disponible' => isset($_POST['disponible']) ? (int)$_POST['disponible'] : 0,
    ];
    
    if (empty($data['nombre']) || empty($data['descripcion'])) {
        $error_message = 'El nombre y descripción son requeridos.';
    } else {
        if ($bioHandler->update($data)) {
            $success_message = 'Biografía actualizada correctamente.';
            $bio = $bioHandler->get();
        } else {
            $error_message = 'Error al actualizar la biografía.';
        }
    }
}

include '../includes/admin-header.php';
include '../includes/admin-sidebar.php';
?>

<main class="admin-main">
    
    <header class="admin-topbar">
        <button class="admin-sidebar-toggle" onclick="toggleSidebar()" aria-label="Toggle sidebar">
            <i class="bi bi-list"></i>
        </button>
        <div>
            <h1 class="admin-topbar-title">Biografia</h1>
            <p class="admin-topbar-subtitle">Edita tu informacion personal y de perfil</p>
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
        
        <!-- Datos actuales -->
        <div class="admin-form-card p-4 mb-4">
            <div class="admin-section-header mb-3">
                <h3 class="admin-section-title">Informacion Actual</h3>
            </div>
            <div class="row g-3">
                <div class="col-md-6"><span class="text-gray-500 fs-7">Nombre</span><p class="mb-0 text-navy"><?php echo htmlspecialchars($bio['nombre']); ?></p></div>
                <div class="col-md-6"><span class="text-gray-500 fs-7">Apellido</span><p class="mb-0 text-navy"><?php echo htmlspecialchars($bio['apellido']); ?></p></div>
                <div class="col-md-6"><span class="text-gray-500 fs-7">Titulo profesional</span><p class="mb-0 text-navy"><?php echo htmlspecialchars($bio['titulo']); ?></p></div>
                <div class="col-md-6"><span class="text-gray-500 fs-7">Ubicacion</span><p class="mb-0 text-navy"><?php echo htmlspecialchars($bio['ubicacion']); ?></p></div>
                <div class="col-12"><span class="text-gray-500 fs-7">Descripcion</span><p class="mb-0 text-navy"><?php echo htmlspecialchars($bio['descripcion']); ?></p></div>
                <div class="col-md-6"><span class="text-gray-500 fs-7">Disponibilidad</span><p class="mb-0 text-navy"><?php echo $bio['disponible'] ? '✓ Disponible' : '✗ No disponible'; ?></p></div>
            </div>
        </div>
        
        <!-- Formulario edicion -->
        <div class="admin-form-card p-4">
            <h3 class="admin-section-title mb-3">Editar Biografia</h3>
            <form method="POST" action="">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label admin-form-label">Nombre</label>
                        <input type="text" class="form-control admin-form-control" name="nombre" value="<?php echo htmlspecialchars($bio['nombre']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label admin-form-label">Apellido</label>
                        <input type="text" class="form-control admin-form-control" name="apellido" value="<?php echo htmlspecialchars($bio['apellido']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label admin-form-label">Titulo profesional</label>
                        <input type="text" class="form-control admin-form-control" name="titulo" value="<?php echo htmlspecialchars($bio['titulo']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label admin-form-label">Ubicacion</label>
                        <input type="text" class="form-control admin-form-control" name="ubicacion" value="<?php echo htmlspecialchars($bio['ubicacion']); ?>">
                    </div>
                    <div class="col-12">
                        <label class="form-label admin-form-label">Descripcion personal</label>
                        <textarea class="form-control admin-form-control" name="descripcion" rows="4" required><?php echo htmlspecialchars($bio['descripcion']); ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label admin-form-label">Disponibilidad</label>
                        <select class="form-select admin-form-control" name="disponible">
                            <option value="1" <?php echo $bio['disponible'] ? 'selected' : ''; ?>>Disponible para proyectos</option>
                            <option value="0" <?php echo !$bio['disponible'] ? 'selected' : ''; ?>>No disponible</option>
                        </select>
                    </div>
                    <div class="col-12 pt-2">
                        <button type="submit" class="btn btn-navy px-4">
                            <i class="bi bi-check-lg me-1"></i>Guardar Cambios
                        </button>
                        <button type="reset" class="btn btn-outline-secondary ms-2">Restaurar</button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
</main>

<?php include '../includes/admin-footer.php'; ?>
