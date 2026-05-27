<?php
/**
 * technologies.php
 * 
 * Sección Tecnologías Dominadas.
 * - Header con subtítulo "DOMINIO TÉCNICO"
 * - Grid de dos columnas con barras de progreso por cada tecnología
 * - Cada barra muestra: nombre, etiqueta de nivel, porcentaje, barra visual coloreada
 * - Fila inferior con stats (proyectos, tecnologías, años, commits)
 */
?>
<section id="tecnologias" class="py-5" style="background-color: #ffffff;">
    <div class="container py-4" style="max-width: 1200px;">
        
        <!-- Header de sección -->
        <div class="text-center mb-5">
            <span class="section-label">DOMINIO T&Eacute;CNICO</span>
            <h2 class="section-title">Tecnolog&iacute;as Dominadas</h2>
            <p class="section-description">
                Nivel de dominio en las principales tecnolog&iacute;as que utilizo en mis proyectos de desarrollo web
            </p>
            <div class="section-divider"></div>
        </div>

        <!-- Barras de progreso - Grid 2 columnas -->
        <div class="row g-4 mb-5" style="max-width: 900px; margin-left: auto; margin-right: auto;">
            <?php
            // Array de tecnologías con niveles
            $technologies = [
                ['name' => 'HTML5', 'level' => 90, 'color' => '#f97316', 'label' => 'Experto'],
                ['name' => 'CSS3 / Sass', 'level' => 85, 'color' => '#3b82f6', 'label' => 'Avanzado'],
                ['name' => 'JavaScript', 'level' => 75, 'color' => '#eab308', 'label' => 'Avanzado'],
                ['name' => 'PHP', 'level' => 70, 'color' => '#8b5cf6', 'label' => 'Intermedio'],
                ['name' => 'MySQL', 'level' => 65, 'color' => '#06b6d4', 'label' => 'Intermedio'],
                ['name' => 'Bootstrap', 'level' => 85, 'color' => '#6d28d9', 'label' => 'Avanzado'],
                ['name' => 'Git / GitHub', 'level' => 80, 'color' => '#374151', 'label' => 'Avanzado']
            ];

            foreach ($technologies as $tech):
            ?>
            <div class="col-md-6">
                <div class="tech-row">
                    <!-- Fila: nombre + etiqueta + porcentaje -->
                    <div class="tech-header">
                        <div class="d-flex align-items-center gap-2">
                            <span class="tech-name">
                                <?php echo $tech['name']; ?>
                            </span>
                            <span class="tech-badge" 
                                  style="background-color: <?php echo $tech['color']; ?>18; 
                                         color: <?php echo $tech['color']; ?>; 
                                         border-color: <?php echo $tech['color']; ?>33;">
                                <?php echo $tech['label']; ?>
                            </span>
                        </div>
                        <span class="tech-percentage" style="color: <?php echo $tech['color']; ?>;">
                            <?php echo $tech['level']; ?>%
                        </span>
                    </div>
                    <!-- Barra de progreso -->
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" 
                             style="width: <?php echo $tech['level']; ?>%; 
                                    background: linear-gradient(90deg, <?php echo $tech['color']; ?>cc, <?php echo $tech['color'] ?>);"
                             aria-valuenow="<?php echo $tech['level']; ?>" 
                             aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Stats row -->
        <div class="row g-4" style="max-width: 900px; margin-left: auto; margin-right: auto;">
            <?php
            $stats = [
                ['label' => 'Proyectos completados', 'value' => '12+', 'icon' => '💼'],
                ['label' => 'Tecnolog&iacute;as dominadas', 'value' => '7+', 'icon' => '⚙️'],
                ['label' => 'A&ntilde;os de formaci&oacute;n', 'value' => '3', 'icon' => '🎓'],
                ['label' => 'Commits en GitHub', 'value' => '200+', 'icon' => '📦']
            ];

            foreach ($stats as $stat):
            ?>
            <div class="col-6 col-lg-3">
                <div class="card border-0 stats-card">
                    <div class="stats-icon"><?php echo $stat['icon']; ?></div>
                    <div class="stats-value">
                        <?php echo $stat['value']; ?>
                    </div>
                    <div class="stats-label">
                        <?php echo $stat['label']; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
