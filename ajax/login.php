<?php
session_start();

$response = array(
    'success' => true,
    'errors' => null
);

try {
    $formData = array();
    parse_str($_POST["formData"], $formData);

    if (!(isset($_SESSION["token"]) && $_SESSION["token"] === $formData["_token"])) {
        throw new Exception('El token no coincide');
    }
    if (trim($formData["username"]) == "") {
        throw new Exception("El campo de usuario no puede estar vacío");
    }
    if (trim($formData["password"]) == "") {
        throw new Exception("El campo password no puede estar vacío");
    }

    require_once '../app/db.php';

    /*
     * Comprueba si el usuario existe en bd, y si es el caso y coincide la contraseña, nos logeamo
     */
    $check_user = $db->prepare("SELECT * FROM users WHERE username = :username OR email = :username");
    $check_user->execute(array(
        ":username" => $formData["username"]
    ));

    if ($check_user->rowCount() <= 0) {
        throw new Exception("Usuario/Contraseña incorrecto");
    }

    $user = $check_user->fetch();

    if (!password_verify($formData["password"], $user["password"])) {
        throw new Exception("Usuario/Contraseña incorrecto");
    }

    /*
     * Login:
     * Ponemos en session el usuario
     */
    $_SESSION["user"] = array(
        "id" => $user["id"],
        "nombre" => $user["name"],
        "email" => $user["email"],
        "usuario" => $user["username"],
        "password" => $user["password"],
        "inversor" => $user["inversor"]
    );

    // Si ponemos que recordemos al usuario, ponemos la cookie con tiempo caducidad de un día
    if (isset($formData["remember_me"])) {
        setcookie("cookie_usuario_logeado", json_encode($_SESSION["user"]), time() + 86400, "/");
    }
} catch (Exception $ex) {
    $response['success'] = false;
    $response['errors'] = array($ex->getMessage());
} finally {
    echo json_encode($response);
}
