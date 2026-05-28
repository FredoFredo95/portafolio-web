<?php
/**
 * technologies.php
 * 
 * Seccion Tecnologias Dominadas.
 * Barras de progreso con nivel de dominio y stats cards.
 * Carga desde MySQL.
 */

require_once __DIR__ . '/../config/database.php';
include 'handlers/technologies.php';

$technologiesHandler = new TechnologiesHandler($mysqli);
$technologies = $technologiesHandler->getAll();
?>
<section id="tecnologias" class="py-5 bg-white">
    <div class="container py-4 max-w-6xl">
        <div class="section-header">
            <span class="section-tag">DOMINIO TECNICO</span>
            <h2 class="section-title">Tecnologias Dominadas</h2>
            <p class="section-desc">Nivel de dominio en las principales tecnologias que utilizo en mis proyectos de desarrollo web</p>
            <div class="section-line"></div>
        </div>
        <div class="row g-4 mb-5 max-w-4 mx-auto">
            <?php if (!empty($technologies)): foreach ($technologies as $tech): ?>
            <div class="col-md-6">
                <div class="mb-1">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <span class="tech-name"><?php echo htmlspecialchars($tech['nombre']); ?></span>
                            <span class="badge tech-badge badge-html5"><?php echo $tech['nivel'] >= 8 ? 'Experto' : ($tech['nivel'] >= 6 ? 'Avanzado' : 'Intermedio'); ?></span>
                        </div>
                        <span class="tech-percent badge-html5"><?php echo ($tech['nivel'] * 10); ?>%</span>
                    </div>
                    <div class="progress progress-tech">
                        <div class="progress-bar progress-bar-tech bar-html5" role="progressbar" style="width: <?php echo ($tech['nivel'] * 10); ?>%" aria-valuenow="<?php echo ($tech['nivel'] * 10); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            <?php endforeach; else: ?>
            <div class="col-12 text-center py-3">
                <p class="text-muted">No hay tecnologías disponibles en este momento.</p>
            </div>
            <?php endif; ?>
        </div>
        <div class="row g-4 max-w-4 mx-auto">
            <div class="col-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-card-icon">💼</div>
                    <div class="stat-card-value">12+</div>
                    <div class="stat-card-label">Proyectos completados</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-card-icon">⚙️</div>
                    <div class="stat-card-value"><?php echo count($technologies); ?>+</div>
                    <div class="stat-card-label">Tecnologias dominadas</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-card-icon">🎓</div>
                    <div class="stat-card-value">3</div>
                    <div class="stat-card-label">Anos de formacion</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-card-icon">📦</div>
                    <div class="stat-card-value">200+</div>
                    <div class="stat-card-label">Commits en GitHub</div>
                </div>
            </div>
        </div>
    </div>
</section>
