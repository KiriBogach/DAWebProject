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

    public function getAllProjects() {
        $selectProject = $this->db->prepare('SELECT *, DATEDIFF(fecha_fin, CURDATE()) AS tiempo_restante FROM projects');
        $selectProject->execute();

        return $selectProject->fetchAll();
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

        $selectProject = $this->db->prepare('SELECT *, DATEDIFF(fecha_fin, CURDATE()) AS tiempo_restante FROM projects WHERE id = :id');
        $selectProject->execute(array(
                                    ':id' => $id
                                ));

        if ($selectProject->rowCount() <= 0) {
            throw new Exception("No se ha encontrado el proyecto buscado con id: '$id'");
        }

        return $selectProject->fetch();
    }

    /**
     * @param int $maxResults
     * @return mixed
     */
    public function getRandomProjects($maxResults = 10) {
        $selectProject = $this->db->prepare('SELECT *, DATEDIFF(fecha_fin, CURDATE()) AS tiempo_restante FROM projects LIMIT :maxResults');
        $selectProject->bindParam(':maxResults', $maxResults, PDO::PARAM_INT);
        $selectProject->execute();

        return $selectProject->fetchAll();
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
    public function addProject($nombre, $fechaInicio, $fechaFin, $rating, $interes, $fondosNecesarios, $fondosAlcanzados = 0, $foto = null) {
        $insert = $this->db->prepare('
INSERT INTO projects 
(nombre, fecha_inicio, fecha_fin, rating, interes, fondos_necesarios, fondos_alcanzados, formato_foto, usuario)
VALUES
(:nombre, :fecha_inicio, :fecha_fin, :rating, :interes, :fondos_necesarios, :fondos_alcanzados, :formato_foto, :usuario)
        ');

        $usuarioLogeado = auth_user();
        if (empty($usuarioLogeado) || $usuarioLogeado['inversor'] !== 'empresario') {
            throw new Exception('Solo puedes registrar un proyecto si estás logeado y eres empresario');
        }

        $formatoFoto = explode('/', $foto['type'])[1];
        $insert->execute(array(
                             ':nombre' => $nombre,
                             ':fecha_inicio' => DateUtils::dateToMYSQL($fechaInicio),
                             ':fecha_fin' => DateUtils::dateToMYSQL($fechaFin),
                             ':rating' => $rating,
                             ':interes' => $interes,
                             ':fondos_necesarios' => $fondosNecesarios,
                             ':fondos_alcanzados' => $fondosAlcanzados, // Los fondos alcanzados al comienzo pueden ser 0
                             ':formato_foto' => $formatoFoto,
                             ':usuario' => $usuarioLogeado['id']
                         ));

        if (!is_null($foto)) {
            $idProyecto = $this->db->lastInsertId();
            $uriFotoProyecto = $idProyecto . '.' . $formatoFoto;
            move_uploaded_file($foto['tmp_name'], '../../resources/proyectos/' . $uriFotoProyecto);
        }

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
        $update = $this->db->prepare('
UPDATE projects SET
nombre = :nombre, fecha_inicio = :fecha_inicio, fecha_fin = :fecha_fin,
rating = :rating, interes = :interes, fondos_necesarios = :fondos_necesarios,
fondos_alcanzados = :fondos_alcanzados
WHERE id = :id
        ');
        $update->execute(array(
                             ':id' => $id,
                             ':nombre' => $nombre,
                             ':fecha_inicio' => DateUtils::dateToMYSQL($fechaInicio),
                             ':fecha_fin' => DateUtils::dateToMYSQL($fechaFin),
                             ':rating' => $rating,
                             ':interes' => $interes,
                             ':fondos_necesarios' => $fondosNecesarios,
                             ':fondos_alcanzados' => $fondosAlcanzados
                         ));

        if ($update->rowCount() <= 0) {
            throw new Exception('Error actualiznado el proyecto');
        }
    }

    /**
     * @param $id
     * @return mixed
     * @throws Exception
     */
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

    public function invertir($id, $inversion) {
        $fondosAlcanzadosActuales = self::getProject($id)['fondos_alcanzados'];

        $update = $this->db->prepare('
UPDATE projects SET
fondos_alcanzados = :fondos_alcanzados
WHERE id = :id
        ');
        $update->execute(array(
                             ':id' => $id,
                             ':fondos_alcanzados' => $fondosAlcanzadosActuales + $inversion
                         ));

        if ($update->rowCount() <= 0) {
            throw new Exception('Error actualiznado el proyecto');
        }
    }

}