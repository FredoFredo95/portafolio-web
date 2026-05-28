<?php
/**
 * projects.php
 * 
 * Seccion Proyectos Realizados.
 * Grid de tarjetas con preview, tags y botones de accion.
 * Carga proyectos desde MySQL.
 */

require_once __DIR__ . '/../config/database.php';
include 'handlers/projects.php';

$projectsHandler = new ProjectsHandler($mysqli);
$projects = $projectsHandler->getAll('published');
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
            <?php if (!empty($projects)): foreach ($projects as $project): ?>
            <div class="col-md-6">
                <div class="card h-100 project-card">
                    <div class="project-preview <?php echo htmlspecialchars($project['gradiente']); ?>">
                        <?php if ($project['destacado']): ?>
                        <div class="project-badge-featured">
                            <i class="bi bi-star-fill" style="font-size: 0.6rem;"></i>Destacado
                        </div>
                        <?php endif; ?>
                        <div class="text-center">
                            <div class="project-preview emoji"><?php echo htmlspecialchars($project['emoji']); ?></div>
                            <span class="project-preview label">Vista previa del proyecto</span>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <h4 class="project-title mb-2"><?php echo htmlspecialchars($project['titulo']); ?></h4>
                        <div class="d-flex flex-wrap gap-1 mb-3">
                            <?php 
                            $tags = array_map('trim', explode(',', $project['tecnologias']));
                            foreach ($tags as $tag): 
                            ?>
                            <span class="tag-tech"><?php echo htmlspecialchars($tag); ?></span>
                            <?php endforeach; ?>
                        </div>
                        <p class="project-desc mb-3"><?php echo htmlspecialchars($project['descripcion']); ?></p>
                        <div class="d-flex gap-2">
                            <?php if (!empty($project['url_demo']) && $project['url_demo'] !== '#'): ?>
                            <a href="<?php echo htmlspecialchars($project['url_demo']); ?>" target="_blank" class="btn btn-sm flex-fill btn-sm-navy d-flex align-items-center justify-content-center gap-1">
                                <i class="bi bi-box-arrow-up-right" style="font-size: 0.75rem;"></i>Ver Demo
                            </a>
                            <?php else: ?>
                            <a href="#" class="btn btn-sm flex-fill btn-sm-navy d-flex align-items-center justify-content-center gap-1" disabled>
                                <i class="bi bi-box-arrow-up-right" style="font-size: 0.75rem;"></i>Ver Demo
                            </a>
                            <?php endif; ?>
                            
                            <?php if (!empty($project['url_github']) && $project['url_github'] !== '#'): ?>
                            <a href="<?php echo htmlspecialchars($project['url_github']); ?>" target="_blank" class="btn btn-sm flex-fill btn-sm-outline d-flex align-items-center justify-content-center gap-1">
                                <i class="bi bi-github" style="font-size: 0.75rem;"></i>GitHub
                            </a>
                            <?php else: ?>
                            <a href="#" class="btn btn-sm flex-fill btn-sm-outline d-flex align-items-center justify-content-center gap-1" disabled>
                                <i class="bi bi-github" style="font-size: 0.75rem;"></i>GitHub
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; else: ?>
            <div class="col-12 text-center py-5">
                <p class="text-muted">No hay proyectos disponibles en este momento.</p>
            </div>
            <?php endif; ?>
        </div>
        <div class="text-center mt-5">
            <a href="https://github.com" target="_blank" class="btn btn-outline-cyan d-inline-flex align-items-center gap-2">
                <i class="bi bi-github"></i>Ver todos los proyectos en GitHub
            </a>
        </div>
    </div>
</section>
