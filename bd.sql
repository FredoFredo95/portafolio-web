-- Crear base de datos
CREATE DATABASE IF NOT EXISTS portfolio_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE portfolio_db;

-- Tabla de administradores
CREATE TABLE IF NOT EXISTS admins (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabla de biografía/perfil
CREATE TABLE IF NOT EXISTS biografia (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    titulo VARCHAR(200),
    descripcion TEXT,
    ubicacion VARCHAR(100),
    disponible BOOLEAN DEFAULT TRUE,
    avatar_url VARCHAR(255),
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabla de habilidades
CREATE TABLE IF NOT EXISTS habilidades (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    icono VARCHAR(50),
    descripcion TEXT,
    nivel INT DEFAULT 5,
    orden INT DEFAULT 0,
    activa BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabla de tecnologías
CREATE TABLE IF NOT EXISTS tecnologias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    icono VARCHAR(50),
    descripcion TEXT,
    nivel INT DEFAULT 5,
    experiencia_anos DECIMAL(3, 1),
    orden INT DEFAULT 0,
    activa BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabla de proyectos
CREATE TABLE IF NOT EXISTS proyectos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(200) NOT NULL,
    descripcion TEXT,
    tecnologias VARCHAR(255),
    emoji VARCHAR(10),
    url_demo VARCHAR(255),
    url_github VARCHAR(255),
    url_preview VARCHAR(255),
    gradiente VARCHAR(50),
    estado ENUM('published', 'draft', 'archived') DEFAULT 'draft',
    visitas INT DEFAULT 0,
    destacado BOOLEAN DEFAULT FALSE,
    orden INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabla de mensajes de contacto
CREATE TABLE IF NOT EXISTS mensajes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    asunto VARCHAR(200),
    mensaje TEXT NOT NULL,
    leido BOOLEAN DEFAULT FALSE,
    respondido BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insertar admin predeterminado
INSERT INTO admins (email, password_hash, nombre) 
VALUES ('admin@sanjuan.dev', '$2y$10$8QBwF4p9.K7I5XQxQzKz2uBUXMGGvVZLQZPQY9HHNEi9QXQJZ5j0W', 'Alfredo')
ON DUPLICATE KEY UPDATE email=email;

-- Insertar datos de ejemplo - Biografía
INSERT INTO biografia (nombre, apellido, titulo, descripcion, ubicacion, disponible, avatar_url) 
VALUES ('Alfredo', 'San Juan', 'Estudiante Tecnico en Informatica', 
'Apasionado por el desarrollo web moderno, con experiencia en PHP, MySQL, JavaScript y Bootstrap. Comprometido con crear soluciones digitales limpias, funcionales y de alto impacto profesional.',
'Chile', TRUE, NULL)
ON DUPLICATE KEY UPDATE nombre='Alfredo';

-- Insertar habilidades de ejemplo
INSERT INTO habilidades (nombre, icono, descripcion, nivel, orden) VALUES
('HTML5', '🌐', 'Estructura semantica y accesible de paginas web modernas', 9, 1),
('CSS3', '🎨', 'Estilos avanzados, animaciones y diseno responsivo', 8, 2),
('JavaScript', '⚡', 'Interactividad dinamica y programacion del lado cliente', 7, 3),
('PHP', '🐘', 'Desarrollo backend, logica de servidor y APIs REST', 9, 4),
('MySQL', '🗄️', 'Diseno y administracion de bases de datos relacionales', 8, 5),
('Bootstrap', '📐', 'Framework CSS para layouts responsivos profesionales', 9, 6),
('GitHub', '🐙', 'Control de versiones, colaboracion y repositorios', 8, 7),
('IA Aplicada', '🤖', 'Integracion de inteligencia artificial al desarrollo web', 6, 8);

-- Insertar tecnologías de ejemplo
INSERT INTO tecnologias (nombre, icono, descripcion, nivel, experiencia_anos, orden) VALUES
('PHP 8', '🐘', 'Desarrollo backend moderno y escalable', 9, 2.5, 1),
('MySQL', '🗄️', 'Base de datos relacional potente', 9, 2.0, 2),
('Bootstrap 5', '📐', 'Framework CSS responsive', 9, 1.5, 3),
('JavaScript ES6+', '⚡', 'Programacion moderna del cliente', 8, 2.0, 4),
('HTML5/CSS3', '🌐', 'Markup y estilos modernos', 9, 3.0, 5),
('Git/GitHub', '🐙', 'Control de versiones', 8, 2.5, 6),
('AJAX', '🔄', 'Peticiones asincronas', 8, 1.5, 7);

-- Insertar proyectos de ejemplo
INSERT INTO proyectos (titulo, descripcion, tecnologias, emoji, url_demo, url_github, gradiente, estado, visitas, destacado, orden) VALUES
('Sistema de Inventario', 
'Sistema web CRUD completo con PHP, MySQL y Bootstrap para gestion de productos, stock e inventario empresarial con reportes en PDF.',
'PHP,MySQL,Bootstrap,AJAX', '📦', '#', '#', 'grad-inventario', 'published', 142, TRUE, 1),

('Portafolio Autoadministrable',
'Portafolio web responsivo con panel CMS propio para gestionar proyectos, habilidades y contenido sin tocar codigo.',
'PHP,JavaScript,CSS,MySQL', '🌐', '#', '#', 'grad-portafolio', 'published', 89, FALSE, 2),

('Blog Tecnologico CMS',
'CMS de blog con sistema de publicaciones, categorias, comentarios y panel de administracion con AJAX para edicion en tiempo real.',
'PHP,AJAX,MySQL,Bootstrap', '✍️', '#', '#', 'grad-blog', 'draft', 0, FALSE, 3),

('App de Encuestas Online',
'Aplicacion para crear, distribuir y analizar encuestas en linea con estadisticas visuales y exportacion de resultados.',
'JavaScript,PHP,Bootstrap,Chart.js', '📊', '#', '#', 'grad-encuestas', 'published', 67, FALSE, 4);

-- Verificar que todo fue creado correctamente
SELECT COUNT(*) as admin_count FROM admins;
SELECT COUNT(*) as habilidades_count FROM habilidades;
SELECT COUNT(*) as tecnologias_count FROM tecnologias;
SELECT COUNT(*) as proyectos_count FROM proyectos;
