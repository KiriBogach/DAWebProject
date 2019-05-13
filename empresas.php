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
                    <h1 class="mt-5">Empresarios</h1>
                </li>
                <li>
                    <p class="text-body text-justify mt-5">
                        Uniéndote a nuestra comunidad de inversores no tendrás problema alguno en encontrar una empresa
                        que se adapte a tus necesidades y tus exigencias. Desde el primer momento podrás empezar a invertir
                        en una solución TIC que te convenza o se ajuste a tu tipo de interés. Además contarás con una extensa
                        lista de empresas y proyectos por los que podrás invertir, cuyo objetivo común seguro que también
                        es el tuyo: la renovación tecnológica. Además, el proceso de inversión es realmente sencillo, solo
                        tienes que buscar tu proyecto ideal <a href="proyectos.php" class="alert-link">aquí</a> e invertir
                        la cantidad que estimes oportuna, en el momento en el que inviertas, verás cómo cada vez está el
                        proyecto más cerca de cumplirse.
                    </p>
                </li>
                <li>
                    <h4 class="mt-5">
                        Todas estas empresas ya han empezado a confiar en nuestra idea. ¿a qué esperas?
                        <a href="registro.php" class="alert-link">Únete.</a>
                    </h4>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container mt-5">
    <?php require_once __DIR__ . '/inc/components/allEmpresarios.php' ?>
</div>
<?php require_once __DIR__ . '/inc/components/footer.php' ?>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="js/randomProjects.js"></script>

</body>

</html>
