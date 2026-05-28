<?php
/**
 * skills.php
 * 
 * Seccion Habilidades y Herramientas.
 * Grid responsivo de tarjetas con icono, nombre y descripcion.
 * Carga desde MySQL.
 */

require_once __DIR__ . '/../config/database.php';
include 'handlers/skills.php';

$skillsHandler = new SkillsHandler($mysqli);
$skills = $skillsHandler->getAll();
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
            <?php if (!empty($skills)): foreach ($skills as $skill): ?>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 skill-card skill-html5-bg">
                    <div class="card-body p-4">
                        <div class="skill-icon-wrap skill-html5-bg">
                            <span><?php echo htmlspecialchars($skill['icono']); ?></span>
                        </div>
                        <h5 class="skill-name skill-html5"><?php echo htmlspecialchars($skill['nombre']); ?></h5>
                        <p class="skill-desc"><?php echo htmlspecialchars($skill['descripcion']); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; else: ?>
            <div class="col-12 text-center py-5">
                <p class="text-muted">No hay habilidades disponibles en este momento.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
