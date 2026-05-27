/**
 * dashboard.js
 * 
 * JavaScript del panel de administracion.
 * Funcionalidades:
 * - Toggle sidebar en movil
 * - Cierre automatico de sidebar al hacer clic en link (movil)
 * - Confirmacion antes de eliminar items
 */

document.addEventListener('DOMContentLoaded', function () {

    // ========================================
    // TOGGLE SIDEBAR (movil)
    // ========================================
    
    window.toggleSidebar = function() {
        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        
        if (sidebar && overlay) {
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        }
    };

    // ========================================
    // CERRAR SIDEBAR AL HACER CLIC EN LINK (movil)
    // ========================================
    
    const sidebarLinks = document.querySelectorAll('.admin-sidebar-nav .nav-link');
    
    sidebarLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            if (window.innerWidth < 992) {
                toggleSidebar();
            }
        });
    });

    // ========================================
    // CONFIRMACION ELIMINAR
    // ========================================
    
    const deleteButtons = document.querySelectorAll('.btn-confirm-delete');
    
    deleteButtons.forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            const confirmed = confirm('¿Estas seguro de que deseas eliminar este elemento?');
            if (!confirmed) {
                e.preventDefault();
            }
        });
    });

});
