<?php

require_once __DIR__ . '/../../app/Projects/ProjectManager.php';

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

$projectManager = new ProjectManager();
$project = $projectManager->getProject($id);
$botonesDeshabilitados = is_null(auth_user()) ? 'disabled title="Solo puedes invertir si estás logeado"' : 'title="Invertir"';

$tiempoRestante = $project['tiempo_restante'] >= 0 ? $project['tiempo_restante'] : 'Proyecto terminado';
$porcentajeConseguido = $project['fondos_alcanzados'] / $project['fondos_necesarios'] * 100;
$uriFoto = $project['id'] . '.' . $project['formato_foto'];
?>
<div hidden id="idProyecto" name="<?= $project['id'] ?>"></div>
<hr class="half-rule"/>
<div class="card text-center" style="padding: 0.5rem;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <h2 class="mt-5"><?= $project['nombre'] ?></h2>
                <img alt="imagen proyecto" style="max-width: 20rem; max-height: 20rem"
                     src="resources/proyectos/<?= $uriFoto ?>" class="rounded-circle"/>
            </div>
            <div class="col-md-6">
                <dl>
                    <dt>
                        Fecha Inicio.
                    </dt>
                    <dd>
                        <?= DateUtils::convertToSpanish($project['fecha_inicio']) ?>
                    </dd>
                    <dt>
                        Tiempo Restante.
                    </dt>
                    <dd>
                        <?= $tiempoRestante ?>
                    </dd>
                    <dt>
                        Rating.
                    </dt>
                    <dd>
                        <?= $project['rating'] ?>
                    </dd>
                    <dt>
                        Interés Medio.
                    </dt>
                    <dd>
                        <?= $project['interes'] ?>
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
                        Fecha Fin.
                    </dt>
                    <dd>
                        <?= DateUtils::convertToSpanish($project['fecha_fin']) ?>
                    </dd>
                    <dt>
                        Fondos Necesarios.
                    </dt>
                    <dd>
                        <?= $project['fondos_necesarios'] ?>
                    </dd>
                    <dt>
                        Fondos Alcanzados.
                    </dt>
                    <dd>
                        <?= $project['fondos_alcanzados'] ?>
                    </dd>
                    <dt>
                        Fondos Alcanzados %
                    </dt>
                    <dd>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar"
                                 style="width: <?= $porcentajeConseguido ?>%"
                                 aria-valuenow="<?= $porcentajeConseguido ?>" aria-valuemin="0"
                                 aria-valuemax="100"/>
                            <b><?= $porcentajeConseguido ?></b>
                        </div>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</div>

<hr class="half-rule"/>