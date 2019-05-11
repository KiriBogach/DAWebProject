<?php

require_once __DIR__ . '/db.config.php';

// Usamos https://www.php.net/manual/es/class.pdo.php
// Importante subir el en php.ini el MAX_UPLOAD_SIZE para poder subir fotos más grandes de 2MB
try {
    // Creamos el objeto PDO de base de datos
    $db = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME.";charset=".CHARSET, DB_USERNAME, DB_PASSWORD);
    // Ponemos que solo traiga los valores asociativos
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e) {
    echo "PDO error: " . $e->getMessage() . "<br/>";
    exit;
}
