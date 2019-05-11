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

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form role="form" id="formProyecto">
                <div class="form-group">
                    <label for="nombreProyecto">
                        Nombre Proyecto
                    </label>
                    <input class="form-control" id="nombreProyecto" required/>
                </div>
                <div class="form-group">
                    <label for="fechaInicio">
                        Fecha Inicio
                    </label>
                    <input type="date" class="form-control" id="fechaInicio" required/>
                </div>
                <div class="form-group">
                    <label for="fechaFin">
                        Fecha Fin
                    </label>
                    <input type="date" class="form-control" id="fechaFin" required/>
                </div>
                <div class="form-group">
                    <label for="rating">
                        Rating
                    </label>
                    <input type="range" min="0" max="10" value="5" class="form-control" id="rating"
                           onchange="updateTextInput(this.value);">
                    <input align="right" type="text" min="0" max="10" value="5" id="ratingValor" required>
                </div>
                <div class="form-group">
                    <label for="interes">
                        Interés %
                    </label>
                    <input type="number" step="any" class="form-control" id="interes" required/>
                </div>
                <div class="form-group">
                    <label for="fondosNecesarios">
                        Fondos Necesarios €/$
                    </label>
                    <input type="number" step="any" class="form-control" id="fondosNecesarios" required/>
                </div>
                <div class="form-group">
                    <label for="fondosAlcanzados">
                        Fondos Alcanzados €/$
                    </label>
                    <input type="number" step="any" class="form-control" id="fondosAlcanzados" value="0" required/>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">
                        Foto del proyecto
                    </label>
                    <input type="file" class="form-control-file" id="foto" accept="image/x-png,image/gif,image/jpeg" required/>
                    <p class="help-block">
                        <i> Seleccione una imagen para mostrar en su perfil</i>
                    </p>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"/> Quiero recibir notificaciones ante inversiones
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">
                    Crear Proyecto
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
<script src="js/registroProyecto.js"></script>

</body>

</html>
