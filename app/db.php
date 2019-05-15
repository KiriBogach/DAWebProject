<?php

// Manejamos el error de que no se haya configurado la conexión a la bd.
if (!file_exists(__DIR__ . '/db.config.php')) {
    header("HTTP/1.1 500 Internal Server Error"); // Error 500 y mostramos error
    echo "<h3>'db.config.php' no encontrado. <br/>Por favor, copie y configure 'db.config' desde 'db.config.template.php.'</h3>";
    exit;
}

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
