<?php

class Utils {

    /*
     * Si el directorio no existe, lo crea con permisos
     */
    public static function checkFolder($folder) {
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }
    }

    public static function test($folder) {
        var_dump('ja');
    }
}