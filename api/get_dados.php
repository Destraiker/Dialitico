<?php
include __DIR__.'/../control/DadosControl.php';
$dadosControl = new DadosControl();

header('Content-type: application/json');

if ($dadosControl->findAll()) {
	http_response_code(200);
	echo json_encode($dadosControl->findAll());
}
else {
	http_response_code(400);
	echo json_encode(array("mensagem" => "Não encontrado"));
}
?>