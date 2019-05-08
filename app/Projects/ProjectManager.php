<?php

require_once __DIR__ . '/../includes.php';

class ProjectManager {

    public $db;

    /**
     * ProjectManager constructor.
     */
    public function __construct() {
        global $db;
        $this->db = $db;
    }

    /**
     * @param $id
     * @return array con los datos del proyecto
     * @throws Exception
     */
    public function getProject($id) {
        if (empty($id)) {
            throw new Exception('Se debe indicar un identificador válido');
        }

        $selectProject = $this->db->prepare('SELECT * FROM projects WHERE id = :id');
        $selectProject->execute(array(
            ':id' => $id
        ));

        if ($selectProject->rowCount() <= 0) {
            throw new Exception("No se ha encontrado el proyecto buscado con id: '$id'");
        }

        return $selectProject->fetch();
    }

    /**
     * @param $nombre
     * @param $fechaInicio
     * @param $fechaFin
     * @param $rating
     * @param $interes
     * @param $fondosNecesarios
     * @throws Exception
     */
    public function addProject($nombre, $fechaInicio, $fechaFin, $rating, $interes, $fondosNecesarios) {
        $insert = $this->db->prepare('
INSERT INTO projects 
(nombre, fecha_inicio, fecha_fin, rating, interes, fondos_necesarios, fondos_alcanzados)
VALUES
(:nombre, :fecha_inicio, :fecha_fin, :rating, :interes, :fondos_necesarios, :fondos_alcanzados)
        ');
        $insert->execute(array(
            ':nombre'               => $nombre,
            ':fecha_inicio'         => $fechaInicio,
            ':fecha_fin'            => $fechaFin,
            ':rating'               => $rating,
            ':interes'              => $interes,
            ':fondos_necesarios'    => $fondosNecesarios,
            ':fondos_alcanzados'    => 0 // Los fondos alcanzados al comienzo son 0
        ));

        if ($insert->rowCount() <= 0) {
            throw new Exception('Error insertando el proyecto');
        }
    }

    /**
     * @param $id
     * @param $nombre
     * @param $fechaInicio
     * @param $fechaFin
     * @param $rating
     * @param $interes
     * @param $fondosNecesarios
     * @param $fondosAlcanzados
     * @throws Exception
     */
    public function updateProject($id, $nombre, $fechaInicio, $fechaFin, $rating, $interes, $fondosNecesarios, $fondosAlcanzados) {
        $insert = $this->db->prepare('
UPDATE projects SET
nombre = :nombre, fecha_inicio = :fecha_inicio, fecha_fin = :fecha_fin,
rating = :rating, interes = :interes, fondos_necesarios = :fondos_necesarios,
fondos_alcanzados = :fondos_alcanzados
WHERE id = :id
        ');
        $insert->execute(array(
            ':id'                   => $id,
            ':nombre'               => $nombre,
            ':fecha_inicio'         => $fechaInicio,
            ':fecha_fin'            => $fechaFin,
            ':rating'               => $rating,
            ':interes'              => $interes,
            ':fondos_necesarios'    => $fondosNecesarios,
            ':fondos_alcanzados'    => $fondosAlcanzados
        ));

        if ($insert->rowCount() <= 0) {
            throw new Exception('Error actualiznado el proyecto');
        }
    }

    public function deleteProject($id) {
        if (empty($id)) {
            throw new Exception('Se debe indicar un identificador válido');
        }

        $selectProject = $this->db->prepare('DELETE FROM projects WHERE id = :id');
        $selectProject->execute(array(
            ':id' => $id
        ));

        if ($selectProject->rowCount() <= 0) {
            throw new Exception("No se ha encontrado el proyecto buscado con id: '$id'");
        }

        return $selectProject->fetch();
    }

}