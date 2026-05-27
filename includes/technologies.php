<?php
/**
 * technologies.php
 * 
 * Seccion Tecnologias Dominadas.
 * Barras de progreso con nivel de dominio y stats cards.
 */
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
            <?php
            $technologies = [
                ['name' => 'HTML5',       'level' => 90, 'bar' => 'bar-html5',  'badge' => 'badge-html5',  'label' => 'Experto'],
                ['name' => 'CSS3 / Sass', 'level' => 85, 'bar' => 'bar-css3',   'badge' => 'badge-css3',   'label' => 'Avanzado'],
                ['name' => 'JavaScript',  'level' => 75, 'bar' => 'bar-js',     'badge' => 'badge-js',     'label' => 'Avanzado'],
                ['name' => 'PHP',         'level' => 70, 'bar' => 'bar-php',    'badge' => 'badge-php',    'label' => 'Intermedio'],
                ['name' => 'MySQL',       'level' => 65, 'bar' => 'bar-mysql',  'badge' => 'badge-mysql',  'label' => 'Intermedio'],
                ['name' => 'Bootstrap',   'level' => 85, 'bar' => 'bar-bootstrap','badge' => 'badge-bootstrap','label' => 'Avanzado'],
                ['name' => 'Git / GitHub','level' => 80, 'bar' => 'bar-git',    'badge' => 'badge-git',    'label' => 'Avanzado'],
            ];
            foreach ($technologies as $tech):
            ?>
            <div class="col-md-6">
                <div class="mb-1">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <span class="tech-name"><?php echo $tech['name']; ?></span>
                            <span class="badge tech-badge <?php echo $tech['badge']; ?>"><?php echo $tech['label']; ?></span>
                        </div>
                        <span class="tech-percent <?php echo $tech['badge']; ?>"><?php echo $tech['level']; ?>%</span>
                    </div>
                    <div class="progress progress-tech">
                        <div class="progress-bar progress-bar-tech <?php echo $tech['bar']; ?>" role="progressbar" style="width: <?php echo $tech['level']; ?>%" aria-valuenow="<?php echo $tech['level']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="row g-4 max-w-4 mx-auto">
            <?php
            $stats = [
                ['icon' => '💼', 'value' => '12+', 'label' => 'Proyectos completados'],
                ['icon' => '⚙️', 'value' => '7+',  'label' => 'Tecnologias dominadas'],
                ['icon' => '🎓', 'value' => '3',   'label' => 'Anos de formacion'],
                ['icon' => '📦', 'value' => '200+','label' => 'Commits en GitHub'],
            ];
            foreach ($stats as $stat):
            ?>
            <div class="col-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-card-icon"><?php echo $stat['icon']; ?></div>
                    <div class="stat-card-value"><?php echo $stat['value']; ?></div>
                    <div class="stat-card-label"><?php echo $stat['label']; ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
