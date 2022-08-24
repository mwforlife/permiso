<?php
require 'controller.php';
$c = new Controller();
$rut = $_POST['rut'];
$rut = str_replace(".","",$rut);

$id = $c->buscaralumno($rut);

if ($id==false) {
    return 0;
}else{
    session_start();
    $_SESSION['id'] = $id;
    echo 1;
}