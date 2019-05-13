<?php

require_once __DIR__ . '/../includes.php';

class InversorManager
{

    public $db;

    /**
     * InversorManager constructor.
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


}