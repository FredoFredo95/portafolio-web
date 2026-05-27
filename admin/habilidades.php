<?php
/**
 * admin/habilidades.php
 * 
 * Gestion de habilidades y herramientas.
 * Grid de cards editables con icono, nombre y descripcion.
 */

$active_page = 'habilidades';

$skills = [
    ['id' => 1, 'name' => 'HTML5',        'icon' => '🌐', 'desc' => 'Estructura semantica de paginas web'],
    ['id' => 2, 'name' => 'CSS3',         'icon' => '🎨', 'desc' => 'Estilos y diseno responsivo'],
    ['id' => 3, 'name' => 'JavaScript',   'icon' => '⚡', 'desc' => 'Interactividad del lado cliente'],
    ['id' => 4, 'name' => 'PHP',          'icon' => '🐘', 'desc' => 'Desarrollo backend'],
    ['id' => 5, 'name' => 'MySQL',        'icon' => '🗄️', 'desc' => 'Bases de datos relacionales'],
    ['id' => 6, 'name' => 'Bootstrap',    'icon' => '📐', 'desc' => 'Framework CSS responsivo'],
    ['id' => 7, 'name' => 'GitHub',       'icon' => '🐙', 'desc' => 'Control de versiones'],
    ['id' => 8, 'name' => 'IA Dev',       'icon' => '🤖', 'desc' => 'IA aplicada al desarrollo'],
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
            <h1 class="admin-topbar-title">Habilidades</h1>
            <p class="admin-topbar-subtitle">Gestion de habilidades y herramientas</p>
        </div>
        <div class="admin-topbar-user">
            <div class="admin-user-avatar">A</div>
            <span class="admin-user-name d-none d-sm-inline">Alfredo</span>
        </div>
    </header>
    
    <div class="admin-content">
        
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
                <h3 class="admin-section-title mb-3">Agregar Habilidad</h3>
                <form method="POST" action="" class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label admin-form-label">Nombre</label>
                        <input type="text" class="form-control admin-form-control" name="name" placeholder="Ej: React" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label admin-form-label">Icono (emoji)</label>
                        <input type="text" class="form-control admin-form-control" name="icon" placeholder="Ej: ⚛️" maxlength="10">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label admin-form-label">Color de acento (hex)</label>
                        <input type="color" class="form-control admin-form-control" name="color" value="#06b6d4">
                    </div>
                    <div class="col-12">
                        <label class="form-label admin-form-label">Descripcion</label>
                        <input type="text" class="form-control admin-form-control" name="desc" placeholder="Breve descripcion de la habilidad...">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-cyan"><i class="bi bi-plus-lg me-1"></i>Agregar</button>
                        <button type="button" class="btn btn-outline-secondary ms-2" data-bs-toggle="collapse" data-bs-target="#formAddSkill">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Grid de habilidades -->
        <div class="row g-3">
            <?php foreach ($skills as $skill): ?>
            <div class="col-md-6 col-lg-4">
                <div class="admin-skill-card">
                    <span class="admin-skill-icon"><?php echo $skill['icon']; ?></span>
                    <div class="admin-skill-info">
                        <div class="admin-skill-name"><?php echo $skill['name']; ?></div>
                        <div class="admin-skill-desc"><?php echo $skill['desc']; ?></div>
                    </div>
                    <div class="admin-skill-actions">
                        <button class="btn-action btn-action-edit" title="Editar"><i class="bi bi-pencil"></i></button>
                        <button class="btn-action btn-action-delete btn-confirm-delete" title="Eliminar"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
    </div>
</main>

<?php include '../includes/admin-footer.php'; ?>
