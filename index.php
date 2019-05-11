<?php
require_once __DIR__ . '/app/includes.php';
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
    <link href="css/blur-img-txt.css" rel="stylesheet">

</head>

<body>

<!-- Cabecera -->
<?php require_once __DIR__ . '/inc/components/header.php' ?>

<!-- Contenido de la página -->

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 text-center">
            <ul class="list-unstyled">
                <!-- Imagen con texto -->
                <li>
                    <div class="jumbotron jumbotron-fluid bg-dark mt-5">
                        <div class="jumbotron-background">
                            <img src="resources/img/business-image.jpg" class="blur img-fluid" alt="Image more info">
                        </div>
                        <div class="container text-white">
                            <p class="lead">Invierte ahora en tecnología para ganar ayudando.</p>
                            <a class="btn btn-primary btn-lg" href="#" role="button">Quiero saber más</a>
                        </div>
                    </div>
                </li>
                <li>
                    <h1 class="mt-5">Bienvenidos al crowdlending inteligente</h1>
                </li>
                <li>
                    <p class="text-body mt-5">
                        TICLending es una empresa de crowdlending (pendiente de patente) dedicada a ofrecer apoyo a
                        las empresas cuyo sector es el de las tecnologías de la información y las comunicaciones.
                        Aquí podrás invertir en proyectos desde automatización de sistemas de regadío hasta incluso
                        proyectos de videojuegos. Todo esto, ayudando a las empresas, ayudando a la innovación, a la
                        renovación de tu propio entorno y al desarrollo, recibiendo intereses a cambio. Por eso en
                        TICLending
                        pensamos que este es el crowdlending inteligente, este es el crowdlending que revoluciona tu
                        entorno.
                    </p>
                </li>
                <li>
                    <img src="resources/img/como-funciona.svg" class="img-fluid mt-5"
                         style="background-color: rgba(216,216,216,0.65)" alt="Crowdlending schema">
                </li>
            </ul>
        </div>
    </div>
</div>


<!-- Mostramos ciertos proyectos aleatorios como muestra de nuestros productos -->
<?php require_once __DIR__ . '/inc/components/randomProjects.php' ?>

<!-- Pie de página -->
<?php require_once __DIR__ . '/inc/components/footer.php' ?>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
