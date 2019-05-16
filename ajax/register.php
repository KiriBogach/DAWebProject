<?php
include_once __DIR__ . '/../app/includes.php';

$response = array(
    'success' => true,
    'errors' => null
);

try {
    $formData = array();
    parse_str($_POST["formData"], $formData);

    // Se comprueban los campos quitando espacios:
    if (trim($formData["name"]) == "") {
        throw new Exception("El nombre no puede estar vacío.");
    }
    if (trim($formData["email"]) == "") {
        throw new Exception("El email no puede estar vacío.");
    }
    if (!filter_var($formData["email"], FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Indique un email válido");
    }
    if (trim($formData["username"]) == "") {
        throw new Exception("El usuario no puede estar vacío.");
    }
    if (trim($formData["password"]) == "") {
        throw new Exception("La contraseña no puede estar vacía.");
    }
    if (trim($formData["inversor"]) == "") {
        throw new Exception("Debe seleccionar entre 'inversor' y 'empresario'");
    }

    require_once '../app/db.php';

    /*
     * Comprueba si el usuario o su email ya existen en algún usuario
     */
    $check_if_user_exists = $db->prepare("SELECT id FROM users WHERE email = :email OR username = :username");
    $check_if_user_exists->execute(array(
        ":email" => $formData["email"],
        ":username" => $formData["username"]
    ));

    if ($check_if_user_exists->rowCount() > 0) {
        throw new Exception("Ya existe un usuario '" . $formData["username"] . "' o con el email '" . $formData["email"] . "'.");
    }

    /*
     * Si no hay errores, registramos en bd y logeamos
     */
    $hashed_password = password_hash($formData["password"], PASSWORD_DEFAULT);
    $create_user = $db->prepare("INSERT INTO users(name, email, username, password, inversor, created_at) VALUES(:name, :email, :username, :password, :inversor, NOW())");
    $create_user->execute(array(
        ":name" => $formData["name"],
        ":email" => $formData["email"],
        ":username" => $formData["username"],
        ":password" => $hashed_password,
        ":inversor" => $formData["inversor"]
    ));

    $user_id = $db->lastInsertId();
    $_SESSION["user"] = array(
        "id" => $user_id,
        "nombre" => $formData["name"],
        "email" => $formData["email"],
        "usuario" => $formData["username"],
        "password" => $hashed_password,
        "inversor" => $formData["inversor"]
    );
} catch (Exception $ex) {
    $response['success'] = false;
    $response['errors'] = array($ex->getMessage());
} finally {
    echo json_encode($response);
}