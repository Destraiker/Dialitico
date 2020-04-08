<?php
include __DIR__ . '/../control/UsuarioControl.php';

$data = file_get_contents('php://input');
$obj =  json_decode($data);
//echo $obj->titulo;

$id = $obj->id;

if (!empty($data)) {
    $usuarioControl = new UsuarioControl();
    $usuarioControl->delete($id);
    header('Location:listar.php');
}
