<?php
/*
 * Configuración de la base de datos
 */
define("DB_SERVER", "localhost");
define("DB_NAME", "daweb");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");

// Usamos https://www.php.net/manual/es/class.pdo.php

try {
    // Creamos el objeto PDO de base de datos
    $db = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Ponemos que solo traiga los valores asociativos
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e) {
    echo "PDO error: " . $e->getMessage() . "<br/>";
    exit;
}
