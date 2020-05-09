<?php
include __DIR__ . '/../control/DadosControl.php';

$dadosControl = new DadosControl();

header('Content-type: application/json');

$url_parts = explode("/dados/", $_SERVER['REQUEST_URI']);
$idUsuario = $url_parts[1];

if (!empty($idUsuario)) {
	if (is_numeric($idUsuario)) {
		if ($dadosControl->findAll($idUsuario)) {
			http_response_code(200);
			echo json_encode($dadosControl->findAll($idUsuario));
		} else {
			http_response_code(400);
			echo json_encode(array("mensagem" => "Não encontrado"));
		}
	} else {
		http_response_code(400);
		echo json_encode(array("mensagem" => "ID invalido"));
	}
} else {
	http_response_code(400);
	echo json_encode(array("mensagem" => "Não foram enviados parâmetros"));
}
