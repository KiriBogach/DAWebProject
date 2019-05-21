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

<!-- Cabecera -->
<?php require_once __DIR__ . '/inc/components/header.php' ?>

<!-- breadcrumbs -->
<nav aria-label="breadcrumb" class="sticky-top">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Proyectos</li>
    </ol>
</nav>

<!-- Contenido de la página -->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 text-center">
            <ul class="list-unstyled">
                <li>
                    <h1 class="mt-5">Proyectos</h1>
                </li>
                <li>
                    <p class="text-body text-justify mt-5">
                        Invertir en una de las empresas que han confiado en nosotros es tan sencillo como
                        rentable. Es tan fácil como explorar entre nuestros proyectos, el que más interesante estimes que es
                        y hacer click en el botón de invertir, esto te llevará a una página con más detalles del proyecto y un campo en el
                        que puedes indicar la cantidad de dinero a invertir y este irá directamente hacia el beneficiario.
                        <br>
                        <strong>Nota:</strong> Sólo podrán invertir en los proyectos los usuarios
                        registrados en la plataforma. Si no estás registrado, haz click
                        <a href="registro.php" class="alert-link">aquí</a>
                        para registrarte.
                    </p>
                </li>
                <li>
                    <h4 class="mt-5">A continuación se muestra la lista de todos los proyectos.</h4>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container mt-5">
<?php require_once __DIR__ . '/inc/components/allProjects.php' ?>
</div>
<?php require_once __DIR__ . '/inc/components/footer.php' ?>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="js/randomProjects.js"></script>
<script src="js/logout.js"></script>

</body>

</html>
