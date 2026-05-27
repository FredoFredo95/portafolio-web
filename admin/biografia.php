<?php
/**
 * admin/biografia.php
 * 
 * Edicion de la informacion biografica y de perfil.
 * Formulario completo con datos personales, descripcion y redes sociales.
 */

$active_page = 'biografia';

// Datos de ejemplo (estaticos)
$bio = [
    'nombre'          => 'Alfredo San Juan',
    'titulo'          => 'Estudiante Tecnico en Informatica',
    'descripcion'     => 'Apasionado por el desarrollo web moderno, con experiencia en PHP, MySQL, JavaScript y Bootstrap. Comprometido con crear soluciones digitales limpias, funcionales y de alto impacto profesional.',
    'email'           => 'alfredo@sanjuan.dev',
    'ubicacion'       => 'Chile',
    'telefono'        => '+569 XXXX XXXX',
    'github'          => 'github.com/alfredosanjuan',
    'linkedin'        => 'linkedin.com/in/alfredosanjuan',
    'disponible'      => true,
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
            <h1 class="admin-topbar-title">Biografia</h1>
            <p class="admin-topbar-subtitle">Edita tu informacion personal y de perfil</p>
        </div>
        <div class="admin-topbar-user">
            <div class="admin-user-avatar">A</div>
            <span class="admin-user-name d-none d-sm-inline">Alfredo</span>
        </div>
    </header>
    
    <div class="admin-content">
        
        <!-- Datos actuales -->
        <div class="admin-form-card p-4 mb-4">
            <div class="admin-section-header mb-3">
                <h3 class="admin-section-title">Informacion Actual</h3>
            </div>
            <div class="row g-3">
                <div class="col-md-6"><span class="text-gray-500 fs-7">Nombre completo</span><p class="mb-0 text-navy"><?php echo $bio['nombre']; ?></p></div>
                <div class="col-md-6"><span class="text-gray-500 fs-7">Titulo profesional</span><p class="mb-0 text-navy"><?php echo $bio['titulo']; ?></p></div>
                <div class="col-12"><span class="text-gray-500 fs-7">Descripcion</span><p class="mb-0 text-navy"><?php echo $bio['descripcion']; ?></p></div>
                <div class="col-md-4"><span class="text-gray-500 fs-7">Email</span><p class="mb-0 text-navy"><?php echo $bio['email']; ?></p></div>
                <div class="col-md-4"><span class="text-gray-500 fs-7">Ubicacion</span><p class="mb-0 text-navy"><?php echo $bio['ubicacion']; ?></p></div>
                <div class="col-md-4"><span class="text-gray-500 fs-7">Telefono</span><p class="mb-0 text-navy"><?php echo $bio['telefono']; ?></p></div>
                <div class="col-md-6"><span class="text-gray-500 fs-7">GitHub</span><p class="mb-0 text-navy"><?php echo $bio['github']; ?></p></div>
                <div class="col-md-6"><span class="text-gray-500 fs-7">LinkedIn</span><p class="mb-0 text-navy"><?php echo $bio['linkedin']; ?></p></div>
            </div>
        </div>
        
        <!-- Formulario edicion -->
        <div class="admin-form-card p-4">
            <h3 class="admin-section-title mb-3">Editar Biografia</h3>
            <form method="POST" action="">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label admin-form-label">Nombre completo</label>
                        <input type="text" class="form-control admin-form-control" name="nombre" value="<?php echo $bio['nombre']; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label admin-form-label">Titulo profesional</label>
                        <input type="text" class="form-control admin-form-control" name="titulo" value="<?php echo $bio['titulo']; ?>" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label admin-form-label">Descripcion personal</label>
                        <textarea class="form-control admin-form-control" name="descripcion" rows="4" required><?php echo $bio['descripcion']; ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label admin-form-label">Email de contacto</label>
                        <input type="email" class="form-control admin-form-control" name="email" value="<?php echo $bio['email']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label admin-form-label">Ubicacion</label>
                        <input type="text" class="form-control admin-form-control" name="ubicacion" value="<?php echo $bio['ubicacion']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label admin-form-label">Telefono</label>
                        <input type="tel" class="form-control admin-form-control" name="telefono" value="<?php echo $bio['telefono']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label admin-form-label">Disponibilidad</label>
                        <select class="form-select admin-form-control" name="disponible">
                            <option value="1" <?php echo $bio['disponible'] ? 'selected' : ''; ?>>Disponible para proyectos</option>
                            <option value="0" <?php echo !$bio['disponible'] ? 'selected' : ''; ?>>No disponible</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label admin-form-label">GitHub</label>
                        <input type="text" class="form-control admin-form-control" name="github" value="<?php echo $bio['github']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label admin-form-label">LinkedIn</label>
                        <input type="text" class="form-control admin-form-control" name="linkedin" value="<?php echo $bio['linkedin']; ?>">
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
