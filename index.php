<?php
require_once 'Controller/controller.php';

ob_start();
session_start(['cookie_lifetime' => 86400,]);

$controller = new Controller();
$controller->init();
?>