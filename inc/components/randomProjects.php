<?php

require_once __DIR__ . '/../../app/Projects/ProjectManager.php';

$projectManager = new ProjectManager();
$projects = $projectManager->getRandomProjects();

foreach ($projects as $project) {
    //var_dump($project);
    $tiempoRestante = $project['tiempo_restante'] >= 0 ? $project['tiempo_restante'] : 'Proyecto terminado';
    $porcentajeConseguido = $project['fondos_alcanzados'] / $project['fondos_necesarios'] * 100;
    ?>
    <hr class="half-rule"/>
    <div class="card text-center" style="padding: 0.5rem;">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <img alt="imagen proyecto" style="max-width: 20rem; max-height: 20rem" src="resources/proyectos/<?=$project['foto']?>"
                         class="rounded-circle"/>
                    <div class="dropdown dropup">
                        <br/>
                        <button class="btn btn-primary dropdown-toggle" type="button" id="botonContratar">
                            Contratar
                        </button>
                        <hr class="half-rule"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <dl>
                        <dt>
                            Tiempo Restante.
                        </dt>
                        <dd>
                            <?=$tiempoRestante?>
                        </dd>
                        <dt>
                            Rating.
                        </dt>
                        <dd>
                            <?=$project['rating']?>
                        </dd>
                        <dt>
                            Interés Medio.
                        </dt>
                        <dd>
                            <?=$project['interes']?>
                        </dd>
                    </dl>
                </div>
                <div class="col-md-6">
                    <div class="dropdown dropup">
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item disabled" href="#">Action</a> <a class="dropdown-item" href="#">Another
                                action</a> <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                    <dl>
                        <dt>
                            Fondos Necesarios.
                        </dt>
                        <dd>
                            <?=$project['fondos_necesarios']?>
                        </dd>
                        <dt>
                            Fondos Alcanzados.
                        </dt>
                        <dd>
                            <?=$project['fondos_alcanzados']?>
                        </dd>
                        <dt>
                            Fondos Alcanzados %
                        </dt>
                        <dd>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: <?=$porcentajeConseguido?>%" aria-valuenow="<?=$porcentajeConseguido?>" aria-valuemin="0" aria-valuemax="100"/>
                                <b><?=$porcentajeConseguido?></b>
                            </div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <hr class="half-rule"/>
    <?php
}
?>