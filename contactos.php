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
        <li class="breadcrumb-item active" aria-current="page">Contacto</li>
    </ol>
</nav>

<!-- Contenido de la página -->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 text-center">
            <ul class="list-unstyled">
                <li>
                    <h1 class="mt-5">¿Tienes algún problema? ¡Contacta con nosotros!</h1>
                </li>
                <li class="mt-5" style="background-color:rgba(165,165,165,0.5);">
                    <h3><a href="mailto:kyryl.bogachy@um.es">Kyryl Bogach</a>(<a
                                href="mailto:kyryl.bogachy@um.es">kyryl.bogachy@um.es</a>)
                        <br>
                        <a href="mailto:victor.nicolasc@um.es">Víctor Nicolás Conesa</a>(<a
                                href="mailto:victor.nicolasc@um.es">kyryl.bogachy@um.es</a>)
                    </h3>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/inc/components/footer.php' ?>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="js/randomProjects.js"></script>
<script src="js/logout.js"></script>

</body>

</html>
