<?php
ini_set('session.cookie_httponly', 1);
session_start();

define("APP_NAME", "AJAX Login");

require_once 'db.php';

/*
 * Función que crea una cadena aleatoria. Usado para la creación de tokens.
 * Referencia: https://stackoverflow.com/questions/4356289/php-random-string-generator
 */
function random_str($length, $keyspace = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ")
{
    $str = '';
    $max = mb_strlen($keyspace, "8bit") - 1;
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[random_int(0, $max)];
    }
    return $str;
}

/*
 * Autenticamos al usuario en cada solicitud de página.
 * Útil para evitar la manipulación de valores de sesión/cookie
 */
function auth_user() {
    global $db;

    $user = null;
    if(isset($_SESSION["user"]) || isset($_COOKIE["cookie_usuario_logeado"]))
    {
        $logged_in_user = isset($_SESSION["user"]) ? $_SESSION["user"] : json_decode($_COOKIE["cookie_usuario_logeado"], true);
        $check_user = $db->prepare("SELECT id FROM users WHERE email = :email AND username = :username AND password = :password");
        $check_user->execute(array(
            ":email" => $logged_in_user["email"],
            ":username" => $logged_in_user["usuario"],
            ":password" => $logged_in_user["password"]
        ));
        if($check_user->rowCount() > 0)
        {
            $user = $logged_in_user;
        }
    }

    return $user;
}

if(!isset($_SESSION["token"]))
{
    $_SESSION["token"] = random_str(60);
}
