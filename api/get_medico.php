<?php
include __DIR__.'/../control/MedicoControl.php';
$medicoControl = new MedicoControl();

header('Content-type: application/json');

if ($medicoControl->findAll()) {
	http_response_code(200);
	echo json_encode($medicoControl->findAll());
}
else {
	http_response_code(400);
	echo json_encode(array("mensagem" => "Não encontrado"));
}
?>