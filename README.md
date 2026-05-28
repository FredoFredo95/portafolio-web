# portafolio-web
Proyecto Evaluación 3 - Diseño y Desarrollo Web

## Descripción
Aplicación web de portafolio profesional con panel administrativo para gestionar proyectos, habilidades, experiencia y contacto. Incluye autenticación de administrador y base de datos MySQL.

## Tecnologías Utilizadas
- **Backend**: PHP
- **Frontend**: HTML, CSS, JavaScript
- **Base de Datos**: MySQL
- **Servidor Web**: Apache/PHP local

## Requisitos Previos
Antes de desplegar el proyecto, asegúrate de tener instalado:
- **PHP** (versión 7.4 o superior)
- **MySQL** (versión 5.7 o superior)
- **Apache** o un servidor web compatible con PHP
- **Git** (para clonar el repositorio)

### Opciones de Instalación:
- **XAMPP**: Recomendado para desarrollo local (incluye Apache, PHP y MySQL)
- **WAMP**: Alternativa en Windows
- **LAMP**: Para Linux
- **Servidor local con PHP**: `php -S localhost:8000`

## Instrucciones de Despliegue en Local

### 1. Clonar el Repositorio
```bash
git clone https://github.com/FredoFredo95/portafolio-web.git
cd portafolio-web
```

### 2. Configurar la Base de Datos

#### Opción A: Importar desde archivo SQL
```bash
mysql -u root -p < bd.sql
```

#### Opción B: Crear manualmente en phpMyAdmin
1. Abre phpMyAdmin en `http://localhost/phpmyadmin`
2. Crea una nueva base de datos llamada `portfolio_db`
3. Selecciona la base de datos
4. Ve a la pestaña "SQL"
5. Abre el archivo `bd.sql` y copia su contenido
6. Pega el contenido en phpMyAdmin y ejecuta

### 3. Configurar Conexión a la Base de Datos
Edita el archivo `config/database.php` (o el archivo de configuración correspondiente) con tus credenciales:

```php
<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', ''); // Tu contraseña de MySQL
define('DB_NAME', 'portfolio_db');
?>
```

### 4. Iniciar el Servidor Local

#### Opción A: Con XAMPP
1. Abre XAMPP Control Panel
2. Inicia **Apache** y **MySQL**
3. Coloca la carpeta `portafolio-web` en `C:/xampp/htdocs/`
4. Accede a: `http://localhost/portafolio-web`

#### Opción B: Con PHP incorporado
Desde la carpeta del proyecto:
```bash
php -S localhost:8000
```
Luego accede a: `http://localhost:8000`

#### Opción C: Con Apache
1. Configura el VirtualHost en `httpd-vhosts.conf`
2. Reinicia Apache
3. Accede a tu dominio configurado

### 5. Acceder a la Aplicación

- **Página Principal**: `http://localhost:8000` (o la URL configurada)
- **Panel Administrativo**: `http://localhost:8000/admin` (requiere login)

### 6. Credenciales de Acceso
Utiliza las credenciales creadas en la base de datos para acceder al panel admin.

> **Nota**: Por defecto, la base de datos se crea vacía. Puedes insertar un usuario administrativo manualmente en phpMyAdmin o crear un script de instalación.

## Estructura del Proyecto
```
portafolio-web/
├── admin/              # Panel administrativo
├── assets/             # Recursos (CSS, JS, imágenes)
├── config/             # Configuración de la aplicación
├── handlers/           # Manejadores de lógica
├── includes/           # Archivos incluibles (header, footer, etc.)
├── bd.sql              # Estructura de base de datos
├── index.php           # Página principal
├── logout.php          # Cerrar sesión
├── process-login.php   # Procesar login
└── README.md           # Este archivo
```

## Funcionalidades
- ✅ Autenticación de administrador
- ✅ Gestión de perfil profesional
- ✅ Gestión de proyectos
- ✅ Gestión de habilidades
- ✅ Gestión de experiencia laboral
- ✅ Formulario de contacto
- ✅ Panel administrativo completo

## Solución de Problemas

### Error: "No se puede conectar a la base de datos"
- Verifica que MySQL esté ejecutándose
- Comprueba las credenciales en `config/database.php`
- Asegúrate de que la base de datos `portfolio_db` existe

### Error: "Archivo no encontrado (404)"
- Verifica la ruta correcta en la URL
- Asegúrate de que el servidor web está ejecutándose
- Comprueba que los permisos de las carpetas son correctos

### Error: "No tienes permisos para acceder"
- Verifica los permisos de carpetas (`chmod 755`)
- Asegúrate de que el usuario de Apache tiene permisos de lectura

## Contribuciones
Las contribuciones son bienvenidas. Por favor, crea un fork del proyecto, haz tus cambios y abre un pull request.

## Autor
**Alfredo San Juan** - Proyecto de Evaluación 3 - Diseño y Desarrollo Web

## Licencia
Este proyecto está bajo licencia MIT. Ver el archivo LICENSE para más detalles.

---

**Última actualización**: Mayo 2026
