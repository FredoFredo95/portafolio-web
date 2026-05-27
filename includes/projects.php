<?php
/**
 * projects.php
 * 
 * Sección Proyectos Realizados.
 * - Header con subtítulo "PORTAFOLIO"
 * - Grid responsivo: 1 col móvil, 2 cols desktop
 * - Tarjetas con: preview degradado + emoji, tags de tecnología, título, descripción, botones Demo/GitHub
 * - Badge "Destacado" en proyecto principal
 * - Botón inferior para ver todos en GitHub
 */
?>
<section id="proyectos" class="py-5" style="background-color: #f8fafc;">
    <div class="container py-4" style="max-width: 1200px;">
        
        <!-- Header de sección -->
        <div class="text-center mb-5">
            <span class="section-label">PORTAFOLIO</span>
            <h2 class="section-title">Proyectos Realizados</h2>
            <p class="section-description">
                Una selecci&oacute;n de mis proyectos m&aacute;s destacados en desarrollo web full stack
            </p>
            <div class="section-divider"></div>
        </div>

        <!-- Grid de proyectos -->
        <div class="row g-4">
            <?php
            // Array de proyectos - datos estáticos (posteriormente desde BD)
            $projects = [
                [
                    'title' => 'Sistema de Inventario',
                    'description' => 'Sistema web CRUD completo con PHP, MySQL y Bootstrap para gesti&oacute;n de productos, stock e inventario empresarial con reportes en PDF.',
                    'tags' => ['PHP', 'MySQL', 'Bootstrap', 'AJAX'],
                    'gradient' => 'linear-gradient(135deg, #1e3a5f 0%, #1a56db 100%)',
                    'emoji' => '📦',
                    'featured' => true
                ],
                [
                    'title' => 'Portafolio Autoadministrable',
                    'description' => 'Portafolio web responsivo con panel CMS propio para gestionar proyectos, habilidades y contenido sin tocar c&oacute;digo.',
                    'tags' => ['PHP', 'JavaScript', 'CSS', 'MySQL'],
                    'gradient' => 'linear-gradient(135deg, #0e7490 0%, #06b6d4 100%)',
                    'emoji' => '🌐',
                    'featured' => false
                ],
                [
                    'title' => 'Blog Tecnol&oacute;gico CMS',
                    'description' => 'CMS de blog con sistema de publicaciones, categor&iacute;as, comentarios y panel de administraci&oacute;n con AJAX para edici&oacute;n en tiempo real.',
                    'tags' => ['PHP', 'AJAX', 'MySQL', 'Bootstrap'],
                    'gradient' => 'linear-gradient(135deg, #4c1d95 0%, #7c3aed 100%)',
                    'emoji' => '✍️',
                    'featured' => false
                ],
                [
                    'title' => 'App de Encuestas Online',
                    'description' => 'Aplicaci&oacute;n para crear, distribuir y analizar encuestas en l&iacute;nea con estad&iacute;sticas visuales y exportaci&oacute;n de resultados.',
                    'tags' => ['JavaScript', 'PHP', 'Bootstrap', 'Chart.js'],
                    'gradient' => 'linear-gradient(135deg, #064e3b 0%, #10b981 100%)',
                    'emoji' => '📊',
                    'featured' => false
                ]
            ];

            foreach ($projects as $project):
            ?>
            <div class="col-md-6">
                <div class="card h-100 border-0 overflow-hidden project-card">
                    
                    <!-- Preview del proyecto con gradiente -->
                    <div class="project-preview" style="background: <?php echo $project['gradient']; ?>;">
                        
                        <!-- Badge destacado -->
                        <?php if ($project['featured']): ?>
                        <div class="project-featured-badge">
                            <i class="bi bi-star-fill"></i>
                            Destacado
                        </div>
                        <?php endif; ?>

                        <!-- Centro: emoji + label -->
                        <div class="project-preview-content">
                            <div class="project-emoji"><?php echo $project['emoji']; ?></div>
                            <span class="project-preview-label">
                                Vista previa del proyecto
                            </span>
                        </div>
                    </div>

                    <!-- Contenido de la tarjeta -->
                    <div class="card-body p-4">
                        <!-- Título -->
                        <h4 class="project-title">
                            <?php echo $project['title']; ?>
                        </h4>

                        <!-- Tags -->
                        <div class="project-tags">
                            <?php foreach ($project['tags'] as $tag): ?>
                            <span class="project-tag">
                                <?php echo $tag; ?>
                            </span>
                            <?php endforeach; ?>
                        </div>

                        <!-- Descripción -->
                        <p class="project-description">
                            <?php echo $project['description']; ?>
                        </p>

                        <!-- Botones -->
                        <div class="project-buttons">
                            <a href="#" class="btn project-btn project-btn-demo">
                                <i class="bi bi-box-arrow-up-right"></i>
                                Ver Demo
                            </a>
                            <a href="#" class="btn project-btn project-btn-github">
                                <i class="bi bi-github"></i>
                                GitHub
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- CTA Ver todos -->
        <div class="text-center mt-5">
            <a href="#" class="cta-all-projects">
                <i class="bi bi-github"></i>
                Ver todos los proyectos en GitHub
            </a>
        </div>
    </div>
</section>
