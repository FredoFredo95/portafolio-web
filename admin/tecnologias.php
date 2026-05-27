<?php
/**
 * admin/tecnologias.php
 * 
 * Gestion de tecnologias dominadas.
 * Tabla con barras de progreso editables para cada tecnologia.
 */

$active_page = 'tecnologias';

$technologies = [
    ['id' => 1, 'name' => 'HTML5',        'level' => 90, 'color' => '#f97316'],
    ['id' => 2, 'name' => 'CSS3',         'level' => 85, 'color' => '#3b82f6'],
    ['id' => 3, 'name' => 'JavaScript',   'level' => 75, 'color' => '#eab308'],
    ['id' => 4, 'name' => 'PHP',          'level' => 70, 'color' => '#8b5cf6'],
    ['id' => 5, 'name' => 'MySQL',        'level' => 65, 'color' => '#06b6d4'],
    ['id' => 6, 'name' => 'Bootstrap',    'level' => 85, 'color' => '#6d28d9'],
    ['id' => 7, 'name' => 'Git / GitHub', 'level' => 80, 'color' => '#374151'],
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
            <h1 class="admin-topbar-title">Tecnologias</h1>
            <p class="admin-topbar-subtitle">Administra el nivel de dominio por tecnologia</p>
        </div>
        <div class="admin-topbar-user">
            <div class="admin-user-avatar">A</div>
            <span class="admin-user-name d-none d-sm-inline">Alfredo</span>
        </div>
    </header>
    
    <div class="admin-content">
        
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
                <h3 class="admin-section-title mb-3">Agregar Tecnologia</h3>
                <form method="POST" action="" class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label admin-form-label">Nombre</label>
                        <input type="text" class="form-control admin-form-control" name="name" placeholder="Ej: Python" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label admin-form-label">Nivel (%)</label>
                        <input type="number" class="form-control admin-form-control" name="level" min="0" max="100" value="50" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-cyan"><i class="bi bi-plus-lg me-1"></i>Agregar</button>
                        <button type="button" class="btn btn-outline-secondary ms-2" data-bs-toggle="collapse" data-bs-target="#formAddTech">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Tabla de tecnologias -->
        <div class="admin-table-wrapper">
            <div class="table-responsive">
                <table class="table admin-table">
                    <thead>
                        <tr>
                            <th>Tecnologia</th>
                            <th>Nivel (%)</th>
                            <th>Barra de progreso</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($technologies as $tech): ?>
                        <tr>
                            <td class="cell-title"><?php echo $tech['name']; ?></td>
                            <td class="text-cyan fw-semibold"><?php echo $tech['level']; ?>%</td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="admin-tech-bar">
                                        <div class="admin-tech-fill" style="width: <?php echo $tech['level']; ?>%; background-color: <?php echo $tech['color']; ?>"></div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end">
                                <div class="d-flex gap-1 justify-content-end">
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
        
    </div>
</main>

<?php include '../includes/admin-footer.php'; ?>
