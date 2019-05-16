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

<!-- breadcrumbs -->
<nav aria-label="breadcrumb" class="sticky-top">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="proyectos.php">Proyectos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Invertir en proyecto</li>
    </ol>
</nav>

<!-- Contenido de la página -->
<div class="alert alert-success alert-dismissable" style="display: none" id="alertaSuccess">
    <h4>
        ¡Éxito!
    </h4> <strong>Proyecto creado!</strong> Proyecto creado con éxito! Redirigiendo...
</div>

<div class="alert alert-danger alert-dismissable" style="display: none" id="alertaError">
    <h4>
        ¡Error!
    </h4>
    <strong>Parámetros incorrectos!</strong>
    <div id="mensajeAlertaError">Error Plantilla</div>
</div>


<h1 class="mt-5">Invirtiendo</h1>

<?php require_once __DIR__ . '/inc/components/proyectById.php' ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form role="form" id="proyectoInversion">
                <div class="form-group">
                    <label for="inversion">
                        Inversión €/$
                    </label>
                    <input type="number" step="any" min="1" max="<?=$project['fondos_necesarios'] - $project['fondos_alcanzados']?>" class="form-control" id="inversion" required/>
                </div>
                <button type="submit" class="btn btn-primary" id="boton_invertir">
                    Invertir
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Pie de página -->
<?php require_once __DIR__ . '/inc/components/footer.php' ?>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="js/inversion.js"></script>

</body>

</html>
