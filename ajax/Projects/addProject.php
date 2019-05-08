<?php

include_once __DIR__ . '/../../app/Projects/ProjectManager.php';

$projectManager = new ProjectManager();

$date = date('Y-m-d H:i:s');
$projectManager->addProject('nombreTest', $date, $date, 2, 3, 1200);