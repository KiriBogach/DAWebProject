<?php

include_once __DIR__ . '/../../app/Projects/ProjectManager.php';

$response = array(
    'success' => true,
    'data' => null,
    'error' => null
);

try {
    $nombreProyecto     = empty($_REQUEST['nombreProyecto'])    ? null : $_REQUEST['nombreProyecto'];
    $fechaInicio        = isset($_REQUEST['fechaInicio'])       ? $_REQUEST['fechaInicio'] : null;
    $fechaFin           = isset($_REQUEST['fechaFin'])          ? $_REQUEST['fechaFin'] : null;
    $rating             = isset($_REQUEST['rating'])            ? $_REQUEST['rating'] : null;
    $interes            = isset($_REQUEST['interes'])           ? $_REQUEST['interes'] : null;
    $fondosNecesarios   = isset($_REQUEST['fondosNecesarios'])  ? $_REQUEST['fondosNecesarios'] : null;
    $fondosAlcanzados   = isset($_REQUEST['fondosAlcanzados'])  ? $_REQUEST['fondosAlcanzados'] : null;
    $foto               = isset($_FILES['foto_file'])           ? $_FILES['foto_file'] : null;

    if (is_null($nombreProyecto) || is_null($fechaInicio)
        || is_null($fechaFin) || is_null($rating)
        || is_null($interes) || is_null($fondosNecesarios)
        || is_null($fondosAlcanzados)) {
        throw new Exception('Error en el parseo de parámetros');
    }

    $dateFechaInicio = DateUtils::parseDateFromJavascript($fechaInicio);
    $dateFechaFin = DateUtils::parseDateFromJavascript($fechaFin);

    $projectManager = new ProjectManager();
    $projectManager->addProject($nombreProyecto, $dateFechaInicio, $dateFechaFin, $rating, $interes, $fondosNecesarios, $fondosAlcanzados, $foto);
} catch (Exception $ex) {
    $response['success'] = false;
    $response['error'] = $ex->getMessage();
} finally {
    echo json_encode($response);
}