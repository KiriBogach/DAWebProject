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

</head>

<body>

<!-- Cabecera -->
<?php require_once __DIR__ . '/inc/components/header.php' ?>

<!-- breadcrumbs -->
<nav aria-label="breadcrumb" class="sticky-top">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Inversores</li>
    </ol>
</nav>

<!-- Contenido de la página -->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 text-center">
            <ul class="list-unstyled">
                <li>
                    <h1 class="mt-5">Inversores</h1>
                </li>
                <li>
                    <p class="text-body text-justify mt-5">
                        Cada día más personas confían en nuestra visión del crowdlending inteligente, en la
                        que invertir por el futuro y la innovación nunca fué tan fácil y beneficioso. Nuestros
                        inversores apuestan cada día por la renovación tecnológica y por el sector de las TIC.
                        Si eres una empresa dedicada a este sector, te damos razones para que confíes en nuestra
                        plataforma y nuestro modo de ver las cosas, y es que, cada inversor es una razón para hacerlo.
                        Así que regístrate ahora mismo como empresario y empieza a disfutar de las ventajas del crowdlending
                        inteligente, desde el momento uno, tu proyecto será compartido con todos los inversores que estén
                        registrados en nuestra página y podrán ayudarte con esos proyectos que necesitan un pequeño
                        empujón financiero.
                    </p>
                </li>
                <li>
                    <h4 class="mt-5">Ellos ya forjan un futuro mejor, ¿A qué esperas tú? <a href="registro.php" class="alert-link">únete</a>.</h4>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container mt-5">
<?php require_once __DIR__ . '/inc/components/allInversors.php' ?>
</div>
<?php require_once __DIR__ . '/inc/components/footer.php' ?>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="js/randomProjects.js"></script>

</body>

</html>
