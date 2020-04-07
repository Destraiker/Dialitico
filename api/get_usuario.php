<?php
include __DIR__.'/../control/UsuarioControl.php';
$usuarioControl = new UsuarioControl();

header('Content-type: application/json');

if ($usuarioControl->findAll()) {
	http_response_code(200);
	echo json_encode($usuarioControl->findAll());
}
else {
	http_response_code(400);
	echo json_encode(array("mensagem" => "Não encontrado"));
}
?>