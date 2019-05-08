<?php

include_once __DIR__ . '/../../app/Projects/ProjectManager.php';

$response = array(
    'success' => true,
    'error' => null
);

try {
    $id = empty($_REQUEST['id']) ? null : $_REQUEST['id'];
    $nombre = empty($_REQUEST['nombre']) ? null : $_REQUEST['nombre'];
    $fechaInicio = isset($_REQUEST['fechaInicio']) ? null : $_REQUEST['fechaInicio'];
    $fechaFin = isset($_REQUEST['fechaFin']) ? null : $_REQUEST['fechaFin'];
    $rating = isset($_REQUEST['rating']) ? null : $_REQUEST['rating'];
    $interes = isset($_REQUEST['interes']) ? null : $_REQUEST['interes'];
    $fondosNecesarios = isset($_REQUEST['fondosNecesarios']) ? null : $_REQUEST['fondosNecesarios'];
    $fondosAlcanzados = isset($_REQUEST['fondosAlcanzados']) ? null : $_REQUEST['fondosAlcanzados'];

    // TODO: coger el formato de las fechas con el DateUtils.php
    // TODO: Ojo con el empty que si digo que los fondosAlcanzados = 0, empty es true
    //      en estos casos, mejor usar isset

    if (is_null($id) || is_null($nombre) || is_null($fechaInicio) || is_null($fechaFin)
        || is_null($rating) || is_null($interes) || is_null($fondosNecesarios) || is_null($fondosAlcanzados)) {
        throw new Exception('Se deben indicar los parámetros correspondientes');
    }

    $projectManager = new ProjectManager();
    $projectManager->updateProject($id, $nombre, $fechaInicio, $fechaFin, $rating, $interes, $fondosNecesarios, $fondosAlcanzados);
} catch (Exception $ex) {
    $response['success'] = false;
    $response['error'] = $ex->getMessage();
} finally {
    echo json_encode($response);
}
