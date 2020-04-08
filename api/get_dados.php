<?php
include __DIR__.'/../control/DadosControl.php';

$data = file_get_contents('php://input');
$obj = json_decode($data);

$dadosControl = new DadosControl();

header('Content-type: application/json');

if (!empty($data)) {
	if ($dadosControl->findAll($obj)) {
		http_response_code(200);
		echo json_encode($dadosControl->findAll($obj));
	}
	else {
		http_response_code(400);
		echo json_encode(array("mensagem" => "Não encontrado"));
	}
}else {
    http_response_code(400);
    echo json_encode(array("mensagem" => "Não foram enviados parâmetros"));
}
