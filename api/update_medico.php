<?php
include __DIR__ . '/../control/MedicoControl.php';

$data = file_get_contents('php://input');
$obj =  json_decode($data);
//echo $obj->titulo;

$id = $obj->id;

if (!$id) {
    http_response_code(400);
    echo json_encode(array("mensagem" => "É necessário um ID para atualização"));
} else {
    if (!empty($data)) {
        $medicoControl = new MedicoControl();
        $medicoControl->update($obj, $id);
    } else {
        http_response_code(400);
        echo json_encode(array("mensagem" => "Não foram enviados parâmetros"));
    }
}
