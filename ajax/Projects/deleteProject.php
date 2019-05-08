<?php

include_once __DIR__ . '/../../app/Projects/ProjectManager.php';

$response = array(
    'success' => true,
    'error' => null
);

try {
    $id = empty($_REQUEST['id']) ? null : $_REQUEST['id'];
    if (is_null($id) ) {
        throw new Exception('Se debe indicar un id');
    }

    $projectManager = new ProjectManager();
    $projectManager->deleteProject($id);
} catch (Exception $ex) {
    $response['success'] = false;
    $response['error'] = $ex->getMessage();
} finally {
    echo json_encode($response);
}
