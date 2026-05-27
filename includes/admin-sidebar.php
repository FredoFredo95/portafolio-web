<?php
/**
 * admin-sidebar.php
 * 
 * Sidebar de navegacion del panel administrativo.
 * Reutilizable en todas las paginas del dashboard.
 * 
 * Parametro: $active_page (string) - identifica la pagina activa
 * Uso: include '../includes/admin-sidebar.php'; 
 *      (definir $active_page antes del include)
 */

if (!isset($active_page)) {
    $active_page = 'dashboard';
}

$menu_items = [
    ['id' => 'dashboard',   'label' => 'Dashboard',         'icon' => 'bi-speedometer2', 'url' => 'index.php'],
    ['id' => 'proyectos',   'label' => 'Proyectos',         'icon' => 'bi-folder',       'url' => 'proyectos.php'],
    ['id' => 'habilidades', 'label' => 'Habilidades',       'icon' => 'bi-tools',        'url' => 'habilidades.php'],
    ['id' => 'tecnologias', 'label' => 'Tecnologias',       'icon' => 'bi-cpu',          'url' => 'tecnologias.php'],
    ['id' => 'biografia',   'label' => 'Biografia',         'icon' => 'bi-person',       'url' => 'biografia.php'],
    ['id' => 'mensajes',    'label' => 'Mensajes',          'icon' => 'bi-envelope',     'url' => 'mensajes.php'],
];
?>

<!-- Overlay para cerrar sidebar en movil -->
<div class="admin-sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<!-- Sidebar -->
<aside class="admin-sidebar" id="adminSidebar">
    
    <!-- Brand -->
    <div class="admin-sidebar-brand">
        <i class="bi bi-code-square"></i>
        <div>
            <div class="brand-name">Alfredo San Juan</div>
            <div class="brand-role">Panel Administrador</div>
        </div>
    </div>
    
    <!-- Navegacion -->
    <nav class="admin-sidebar-nav">
        <?php foreach ($menu_items as $item): 
            $is_active = ($active_page === $item['id']) ? 'active' : '';
        ?>
        <a href="<?php echo $item['url']; ?>" class="nav-link <?php echo $is_active; ?>">
            <i class="bi <?php echo $item['icon']; ?>"></i>
            <span><?php echo $item['label']; ?></span>
        </a>
        <?php endforeach; ?>
    </nav>
    
    <!-- Footer sidebar: Logout -->
    <div class="admin-sidebar-footer">
        <a href="../index.php" class="btn-logout">
            <i class="bi bi-box-arrow-left"></i>
            <span>Cerrar Sesion</span>
        </a>
    </div>
    
</aside>
