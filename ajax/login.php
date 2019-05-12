<?php
session_start();

$errors = array();
$success = false;

$formData = array();
parse_str($_POST["formData"], $formData);

if (isset($_SESSION["token"]) && $_SESSION["token"] === $formData["_token"])  //if tokens match
{

    if (trim($formData["username"]) == "") {
        $errors[] = "Username field can't be blank.";
    }
    if (trim($formData["password"]) == "") {
        $errors[] = "Password field can't be blank.";
    }

    require_once '../app/db.php';

    /*
     * Check if the user exists in database, if so check the password and if match log in the user
     */
    $check_user = $db->prepare("SELECT * FROM users WHERE username = :username OR email = :username");
    $check_user->execute(array(
                             ":username" => $formData["username"]
                         ));
    if ($check_user->rowCount() > 0) {
        $user = $check_user->fetch();
        if (password_verify($formData["password"], $user["password"])) {
            /*
             * Log in the user
             */
            $_SESSION["user"] = array(
                "id" => $user["id"],
                "nombre" => $user["name"],
                "email" => $user["email"],
                "usuario" => $user["username"],
                "password" => $user["password"],
                "inversor" => $user["inversor"]
            );
            if (isset($formData["remember_me"])) {
                setcookie("cookie_usuario_logeado", json_encode($_SESSION["user"]), time() + 86400, "/");
            }
            $success = true;
        }
    } else {
        $errors[] = "Usuario/Contraseña incorrecto";
    }
}
echo json_encode(array("errors" => $errors, "success" => $success));

