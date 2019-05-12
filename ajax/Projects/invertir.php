<?php

include_once __DIR__ . '/../../app/Projects/ProjectManager.php';

$response = array(
    'success' => true,
    'error' => null
);

try {
    $idProyecto = empty($_REQUEST['idProyecto']) ? null : $_REQUEST['idProyecto'];
    $inversion = !isset($_REQUEST['inversion']) ? null : $_REQUEST['inversion'];

    if (is_null($idProyecto) || is_null($inversion) ) {
        throw new Exception('Se deben indicar los parámetros correspondientes');
    }

    $projectManager = new ProjectManager();
    $projectManager->invertir($idProyecto, $inversion);
} catch (Exception $ex) {
    $response['success'] = false;
    $response['error'] = $ex->getMessage();
} finally {
    echo json_encode($response);
}
