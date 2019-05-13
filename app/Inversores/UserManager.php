<?php

require_once __DIR__ . '/../includes.php';

class UserManager
{

    public $db;

    /**
     * UserManager constructor.
     */
    public function __construct()
    {
        global $db;
        $this->db = $db;
    }

    public function getAllInversors()
    {
        $selectInversor = $this->db->prepare('SELECT * FROM users WHERE inversor="inversor"');
        $selectInversor->execute();

        return $selectInversor->fetchAll();
    }

    public function getAllEmpresarios()
    {
        $selectInversor = $this->db->prepare('SELECT * FROM users WHERE inversor="empresario"');
        $selectInversor->execute();

        return $selectInversor->fetchAll();
    }


}