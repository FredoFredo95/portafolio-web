<?php
/**
 * projects.php
 * 
 * Seccion Proyectos Realizados.
 * Grid de tarjetas con preview, tags y botones de accion.
 */
?>
<section id="proyectos" class="py-5 bg-offwhite">
    <div class="container py-4 max-w-6xl">
        <div class="section-header">
            <span class="section-tag">PORTAFOLIO</span>
            <h2 class="section-title">Proyectos Realizados</h2>
            <p class="section-desc">Una seleccion de mis proyectos mas destacados en desarrollo web full stack</p>
            <div class="section-line"></div>
        </div>
        <div class="row g-4">
            <?php
            $projects = [
                ['title' => 'Sistema de Inventario',       'desc' => 'Sistema web CRUD completo con PHP, MySQL y Bootstrap para gestion de productos, stock e inventario empresarial con reportes en PDF.', 'tags' => ['PHP','MySQL','Bootstrap','AJAX'],       'grad' => 'grad-inventario', 'emoji' => '📦', 'featured' => true],
                ['title' => 'Portafolio Autoadministrable','desc' => 'Portafolio web responsivo con panel CMS propio para gestionar proyectos, habilidades y contenido sin tocar codigo.',                    'tags' => ['PHP','JavaScript','CSS','MySQL'],       'grad' => 'grad-portafolio', 'emoji' => '🌐', 'featured' => false],
                ['title' => 'Blog Tecnologico CMS',        'desc' => 'CMS de blog con sistema de publicaciones, categorias, comentarios y panel de administracion con AJAX para edicion en tiempo real.',  'tags' => ['PHP','AJAX','MySQL','Bootstrap'],       'grad' => 'grad-blog',       'emoji' => '✍️', 'featured' => false],
                ['title' => 'App de Encuestas Online',     'desc' => 'Aplicacion para crear, distribuir y analizar encuestas en linea con estadisticas visuales y exportacion de resultados.',             'tags' => ['JavaScript','PHP','Bootstrap','Chart.js'],'grad' => 'grad-encuestas',  'emoji' => '📊', 'featured' => false],
            ];
            foreach ($projects as $project):
            ?>
            <div class="col-md-6">
                <div class="card h-100 project-card">
                    <div class="project-preview <?php echo $project['grad']; ?>">
                        <?php if ($project['featured']): ?>
                        <div class="project-badge-featured">
                            <i class="bi bi-star-fill" style="font-size: 0.6rem;"></i>Destacado
                        </div>
                        <?php endif; ?>
                        <div class="text-center">
                            <div class="project-preview emoji"><?php echo $project['emoji']; ?></div>
                            <span class="project-preview label">Vista previa del proyecto</span>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <h4 class="project-title mb-2"><?php echo $project['title']; ?></h4>
                        <div class="d-flex flex-wrap gap-1 mb-3">
                            <?php foreach ($project['tags'] as $tag): ?>
                            <span class="tag-tech"><?php echo $tag; ?></span>
                            <?php endforeach; ?>
                        </div>
                        <p class="project-desc mb-3"><?php echo $project['desc']; ?></p>
                        <div class="d-flex gap-2">
                            <a href="#" class="btn btn-sm flex-fill btn-sm-navy d-flex align-items-center justify-content-center gap-1">
                                <i class="bi bi-box-arrow-up-right" style="font-size: 0.75rem;"></i>Ver Demo
                            </a>
                            <a href="#" class="btn btn-sm flex-fill btn-sm-outline d-flex align-items-center justify-content-center gap-1">
                                <i class="bi bi-github" style="font-size: 0.75rem;"></i>GitHub
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-5">
            <a href="#" class="btn btn-outline-cyan d-inline-flex align-items-center gap-2">
                <i class="bi bi-github"></i>Ver todos los proyectos en GitHub
            </a>
        </div>
    </div>
</section>
