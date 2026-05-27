<?php
/**
 * skills.php
 * 
 * Sección Habilidades y Herramientas.
 * - Header con subtítulo "HERRAMIENTAS" y título principal
 * - Grid responsivo: 2 cols móvil, 3 cols tablet, 4 cols desktop
 * - Tarjetas con: icono emoji, nombre, descripción
 * - Cada tarjeta tiene color de acento propio y hover elevado
 * - Datos estáticos de ejemplo (HTML5, CSS3, JS, PHP, MySQL, Bootstrap, GitHub, IA)
 */
?>
<section id="habilidades" class="py-5" style="background-color: #f8fafc;">
    <div class="container py-4" style="max-width: 1200px;">
        
        <!-- Header de sección -->
        <div class="text-center mb-5">
            <span class="section-label">HERRAMIENTAS</span>
            <h2 class="section-title">Habilidades y Herramientas</h2>
            <p class="section-description">
                Tecnolog&iacute;as y herramientas que domino para el desarrollo web moderno y profesional
            </p>
            <div class="section-divider"></div>
        </div>

        <!-- Grid de skills -->
        <div class="row g-4">
            <?php
            // Array de habilidades - datos estáticos (posteriormente vendrán de BD)
            $skills = [
                [
                    'name' => 'HTML5',
                    'icon' => '🌐',
                    'desc' => 'Estructura sem&aacute;ntica y accesible de p&aacute;ginas web modernas',
                    'accent' => '#f97316',
                    'bg' => '#fff7ed',
                    'border' => '#fed7aa'
                ],
                [
                    'name' => 'CSS3',
                    'icon' => '🎨',
                    'desc' => 'Estilos avanzados, animaciones y dise&ntilde;o responsivo',
                    'accent' => '#3b82f6',
                    'bg' => '#eff6ff',
                    'border' => '#bfdbfe'
                ],
                [
                    'name' => 'JavaScript',
                    'icon' => '⚡',
                    'desc' => 'Interactividad din&aacute;mica y programaci&oacute;n del lado cliente',
                    'accent' => '#ca8a04',
                    'bg' => '#fefce8',
                    'border' => '#fde68a'
                ],
                [
                    'name' => 'PHP',
                    'icon' => '🐘',
                    'desc' => 'Desarrollo backend, l&oacute;gica de servidor y APIs REST',
                    'accent' => '#7c3aed',
                    'bg' => '#f5f3ff',
                    'border' => '#ddd6fe'
                ],
                [
                    'name' => 'MySQL',
                    'icon' => '🗄️',
                    'desc' => 'Dise&ntilde;o y administraci&oacute;n de bases de datos relacionales',
                    'accent' => '#0369a1',
                    'bg' => '#f0f9ff',
                    'border' => '#bae6fd'
                ],
                [
                    'name' => 'Bootstrap',
                    'icon' => '📐',
                    'desc' => 'Framework CSS para layouts responsivos profesionales',
                    'accent' => '#6d28d9',
                    'bg' => '#faf5ff',
                    'border' => '#e9d5ff'
                ],
                [
                    'name' => 'GitHub',
                    'icon' => '🐙',
                    'desc' => 'Control de versiones, colaboraci&oacute;n y repositorios',
                    'accent' => '#374151',
                    'bg' => '#f9fafb',
                    'border' => '#e5e7eb'
                ],
                [
                    'name' => 'IA Aplicada',
                    'icon' => '🤖',
                    'desc' => 'Integraci&oacute;n de inteligencia artificial al desarrollo web',
                    'accent' => '#0891b2',
                    'bg' => '#ecfeff',
                    'border' => '#a5f3fc'
                ]
            ];

            foreach ($skills as $skill):
            ?>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 border-0 skill-card" 
                     style="border-color: <?php echo $skill['border']; ?> !important;">
                    <div class="card-body p-4">
                        <!-- Icono contenedor -->
                        <div class="skill-icon-container"
                             style="background-color: <?php echo $skill['bg']; ?>;
                                    border-color: <?php echo $skill['border']; ?>;">
                            <span class="skill-icon"><?php echo $skill['icon']; ?></span>
                        </div>
                        <!-- Nombre -->
                        <h5 class="skill-name" style="color: <?php echo $skill['accent']; ?>;">
                            <?php echo $skill['name']; ?>
                        </h5>
                        <!-- Descripción -->
                        <p class="skill-description">
                            <?php echo $skill['desc']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
