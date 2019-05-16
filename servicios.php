<?php
require_once __DIR__ . '/app/includes.php';
$loggedUser=auth_user()
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TicLending</title>
    <link rel="shortcut icon" type="image/png" href="resources/ico/favicon.png"/>

    <!-- Cargamos Bootstrap -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Cargamos los css -->


</head>

<body>

<!-- Cabecera -->
<?php require_once __DIR__ . '/inc/components/header.php' ?>

<!-- breadcrumbs -->
<nav aria-label="breadcrumb" class="sticky-top">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Servicios</li>
    </ol>
</nav>

<!-- Contenido de la página -->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 text-center">
            <ul class="list-unstyled">
                <li>
                    <p class="text-body text-justify mt-5">
                        Nuestra empresa ofrece servicios de Crowdlending orientado en su mayoría a las TIC.
                        En nuestro portal web podrás registrar tus proyectos que necesiten financiación, así
                        como, invertir en el resto de proyectos de empresas que colaboren con nosotros, a cambio de
                        unos ciertos intereses.
                        <br>
                        <br>
                        <strong>Nota:</strong> Sólo podrán hacer uso de nuestros servicios los usuarios
                        registrados en la plataforma. Si no estás registrado, haz click
                        <a href="registro.php" class="alert-link">aquí</a>
                        para registrarte.
                    </p>
                </li>
                <li>
                    <h3 class="mt-5">Cómo invertir en un proyecto</h3>
                </li>
                <li>
                    <p class="text-body text-justify mt-5 mb-5">
                        Invertir en nuestra plataforma, tiene grandes ventajas, puedes invertir en proyectos que se
                        dediquen al mundo de las TIC íntegramente, lo cual, te ofrece garantías de que tu dinero se
                        está utilizando para mejorar tecnológicamente el mundo a la misma vez que ofrece un beneficio
                        para ti y para el empresario. Por tanto, si deseas invertir en futuro, esta es tu opción.
                        Para poder invertir, como se ha dicho previamente, hay que estar
                        <a href="registro.php" class="alert-link">resgistrado.</a> Una vez hecho esto, es tan fácil como
                        seguir los siguientes pasos:
                    <dl class="row text-left">
                        <dt class="col-sm-3">1.</dt>
                        <dd class="col-sm-9">
                            Ir a la página <a href="proyectos.php" class="alert-link">proyectos</a>, donde encontrarás
                            una detallada lista de proyectos activos por los que podrás invertir.
                        </dd>
                        <dt class="col-sm-3">2.</dt>
                        <dd class="col-sm-9">
                            Seleccionar el proyecto que más nos interese y pulsar el botón invertir.
                        </dd>
                        <dt class="col-sm-3">3.</dt>
                        <dd class="col-sm-9">
                            Observar detalladamente los plazos, los intereses y el rating del proyecto y decidir si
                            queremos invertir en él realmente.
                        </dd>
                        <dt class="col-sm-3">4.</dt>
                        <dd class="col-sm-9">
                            Indicar en el campo de texto la cantidad de dinero que queremos invertir y pulsar el botón
                            Invertir.
                        </dd>
                    </dl>
                    </p>
                </li>
                <li>
                    <hr class="half-rule mt-5"/>
                    <hr class="half-rule"/>
                </li>
                <li>
                    <h3 class="mt-5">Cómo registrar un proyecto</h3>
                </li>
                <li>
                    <p class="text-body text-justify mt-5 mb-5">
                        Registrar un proyecto en nuestra plataforma, además de ser fácil te permite disfrutar de grandes
                        ventajas. Tu proyecto será compartido con todos los inversores de nuestra plataforma de forma
                        que a partir del mismo momento en el que terminas el proceso, inversores con los que compartas
                        el mismo interés, podrán invertir en tu proyecto y ayudarte a cumplir tus objetivos y tus metas
                        como empresario. Si quieres compartir tu proyecto y llevarlo adelante con personas que cumplan
                        tus mismos objetivos, esta es tu ocasión.
                        Para poder registrar un proyecto, primero debes estar
                        <a href="registro.php" class="alert-link">resgistrado.</a> como empresario. Una vez jecho esto,
                        es tan fácil como seguir los siguientes pasos:
                    <dl class="row text-left">
                        <dt class="col-sm-3">1.</dt>
                        <dd class="col-sm-9">
                            Ir a la página
                            <?php
                            if(is_null($loggedUser) || ($usuarioLogeado['inversor'] !== 'empresario')) {
                            ?>
                            Registrar proyecto
                            <?php
                            } else {
                                ?>
                                <a href="#" class="disabled" tabindex="-1">Registrar proyecto</a>
                                <?php
                            }
                            ?>
                            .
                        </dd>
                        <dt class="col-sm-3">2.</dt>
                        <dd class="col-sm-9">
                            En esta página podrás indicar los datos de tu proyecto, así como el progreso actual en la
                            inversión necesaria y una imagen para llamar la atención de tus inversores.
                        </dd>
                        <dt class="col-sm-3">3.</dt>
                        <dd class="col-sm-9">
                            Hacer click en Crear proyecto.
                        </dd>
                        <dt class="col-sm-3">4.</dt>
                        <dd class="col-sm-9">
                            Esperar a que los inversores te ayuden a cumplir tus objetivos como empresario.
                        </dd>
                    </dl>
                    </p>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/inc/components/footer.php' ?>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="js/randomProjects.js"></script>

</body>

</html>
