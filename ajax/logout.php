<?php
include_once __DIR__ . '/../app/includes.php';

$response = array(
    'success' => true,
    'errors' => null
);

try {
    session_destroy();
    unset($_COOKIE[COOKIE_USUARIO]);
    setcookie(COOKIE_USUARIO, '', time() - 3600, '/');
} catch (Exception $ex) {
    $response['success'] = false;
    $response['errors'] = array($ex->getMessage());
} finally {
    echo json_encode($response);
}
