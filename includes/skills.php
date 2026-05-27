<?php
/**
 * skills.php
 * 
 * Seccion Habilidades y Herramientas.
 * Grid responsivo de 8 tarjetas con icono, nombre y descripcion.
 */
?>
<section id="habilidades" class="py-5 bg-offwhite">
    <div class="container py-4 max-w-6xl">
        <div class="section-header">
            <span class="section-tag">HERRAMIENTAS</span>
            <h2 class="section-title">Habilidades y Herramientas</h2>
            <p class="section-desc">Tecnologias y herramientas que domino para el desarrollo web moderno y profesional</p>
            <div class="section-line"></div>
        </div>
        <div class="row g-4">
            <?php
            $skills = [
                ['name' => 'HTML5',      'icon' => '🌐', 'desc' => 'Estructura semantica y accesible de paginas web modernas',      'class' => 'skill-html5',      'bg' => 'skill-html5-bg'],
                ['name' => 'CSS3',       'icon' => '🎨', 'desc' => 'Estilos avanzados, animaciones y diseno responsivo',            'class' => 'skill-css3',       'bg' => 'skill-css3-bg'],
                ['name' => 'JavaScript', 'icon' => '⚡', 'desc' => 'Interactividad dinamica y programacion del lado cliente',      'class' => 'skill-js',         'bg' => 'skill-js-bg'],
                ['name' => 'PHP',        'icon' => '🐘', 'desc' => 'Desarrollo backend, logica de servidor y APIs REST',            'class' => 'skill-php',        'bg' => 'skill-php-bg'],
                ['name' => 'MySQL',      'icon' => '🗄️', 'desc' => 'Diseno y administracion de bases de datos relacionales',       'class' => 'skill-mysql',      'bg' => 'skill-mysql-bg'],
                ['name' => 'Bootstrap',  'icon' => '📐', 'desc' => 'Framework CSS para layouts responsivos profesionales',         'class' => 'skill-bootstrap',  'bg' => 'skill-bootstrap-bg'],
                ['name' => 'GitHub',     'icon' => '🐙', 'desc' => 'Control de versiones, colaboracion y repositorios',            'class' => 'skill-github',     'bg' => 'skill-github-bg'],
                ['name' => 'IA Aplicada','icon' => '🤖', 'desc' => 'Integracion de inteligencia artificial al desarrollo web',     'class' => 'skill-ia',         'bg' => 'skill-ia-bg'],
            ];
            foreach ($skills as $skill):
            ?>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 skill-card <?php echo $skill['bg']; ?>">
                    <div class="card-body p-4">
                        <div class="skill-icon-wrap <?php echo $skill['bg']; ?>">
                            <span><?php echo $skill['icon']; ?></span>
                        </div>
                        <h5 class="skill-name <?php echo $skill['class']; ?>"><?php echo $skill['name']; ?></h5>
                        <p class="skill-desc"><?php echo $skill['desc']; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
