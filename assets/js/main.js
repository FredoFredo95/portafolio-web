/**
 * main.js
 * 
 * JavaScript personalizado para el portafolio.
 * Funcionalidades:
 * - Cierre automático del menú móvil al hacer clic en un link
 * - Scroll suave para los enlaces de navegación
 * - Navbar: cambio de estilo en links según sección activa
 * - Animación fade-in de secciones al hacer scroll
 * - Validación básica del formulario de contacto
 * - Preparación para envío AJAX del formulario (fase posterior)
 */

document.addEventListener('DOMContentLoaded', function () {

    // ========================================
    // MENÚ MÓVIL: cerrar al hacer clic en link
    // ========================================
    
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    const navbarToggler = document.querySelector('.navbar-toggler');

    navLinks.forEach(function (link) {
        link.addEventListener('click', function () {
            // Solo si el menú está expandido en móvil
            if (window.innerWidth < 768 && navbarCollapse.classList.contains('show')) {
                navbarToggler.click(); // simula clic en el toggle para cerrar
            }
        });
    });

    // ========================================
    // SCROLL SPY MANUAL (respaldar al de Bootstrap)
    // ========================================

    const sections = document.querySelectorAll('section[id]');
    
    function updateActiveNav() {
        let current = '';
        const scrollPos = window.scrollY + 100;

        sections.forEach(function (section) {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(function (link) {
            link.classList.remove('active');
            const href = link.getAttribute('href');
            if (href === '#' + current) {
                link.classList.add('active');
            }
        });
    }

    window.addEventListener('scroll', updateActiveNav);
    updateActiveNav(); // inicial

    // ========================================
    // ANIMACIÓN FADE-IN AL SCROLL
    // ========================================

    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const fadeObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                fadeObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Aplicar a las secciones principales
    document.querySelectorAll('section').forEach(function (section) {
        section.classList.add('fade-in-section');
        fadeObserver.observe(section);
    });

    // ========================================
    // VALIDACIÓN FORMULARIO DE CONTACTO
    // ========================================

const contactForm = document.getElementById('contactForm');
if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
        // Validación opcional, pero NO e.preventDefault()
        const nombre = document.getElementById('contact-name').value.trim();
        const email = document.getElementById('contact-email').value.trim();
        const asunto = document.getElementById('contact-subject').value.trim();
        const mensaje = document.getElementById('contact-message').value.trim();

        if (!nombre || !email || !asunto || !mensaje) {
            alert('Por favor, completa todos los campos.');
            e.preventDefault(); // solo prevenimos si están vacíos
            return;
        }
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert('Por favor, ingresa un correo electrónico válido.');
            e.preventDefault();
            return;
        }
        // Si todo está bien, aparecera una alerta de mensaje enviado.
            alert('¡Mensaje enviado! En breve nos pondremos en contacto.');
    });
}
// ========================================
// VALIDACIÓN FORMULARIO DE LOGIN
// ========================================

const loginForm = document.getElementById('loginForm');
if (loginForm) {
    loginForm.addEventListener('submit', function (e) {
        const email = document.getElementById('login-email').value.trim();
        const password = document.getElementById('login-password').value;

        if (!email || !password) {
            e.preventDefault();  // Solo evitar si hay campos vacíos
            alert('Por favor, completa todos los campos.');
            return;
        }
    });
}

    // ========================================
    // NAVBAR: sombra más pronunciada al scroll
    // ========================================

    const navbar = document.querySelector('.navbar');
    
    window.addEventListener('scroll', function () {
        if (window.scrollY > 10) {
            navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.3)';
        } else {
            navbar.style.boxShadow = '';
        }
    });

});
