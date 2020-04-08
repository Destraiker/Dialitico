<?php
include __DIR__ . '/../control/MedicoControl.php';

$data = file_get_contents('php://input');
$obj =  json_decode($data);
//echo $obj->titulo;

$id = $obj->id;

if (!empty($data)) {
    $medicoControl = new MedicoControl();
    $mensagem=$medicoControl->delete($id);
    echo json_encode(array("mensagem" => $mensagem));
}
