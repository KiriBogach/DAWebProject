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

<!-- Contenido de la página -->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 text-center">
            <ul class="list-unstyled">
                <li>
                    <h1 class="mt-5">Proyectos</h1>
                </li>
                <li>
                    <h4 class="mt-1">A continuación se muestra la lista de todos los proyectos.</h4>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/inc/components/allProjects.php' ?>

<?php require_once __DIR__ . '/inc/components/footer.php' ?>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="js/randomProjects.js"></script>

</body>

</html>
