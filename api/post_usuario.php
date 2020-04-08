<?php

include 'control/UsuarioControl.php';

$data = file_get_contents('php://input');
$obj = json_decode($data);

if (!empty($data)) {
    try {
        $usuarioControl = new UsuarioControl();
        $mensagem=$usuarioControl->insert($obj);
        http_response_code(200);
        echo json_encode(array("mensagem" => $mensagem));
    } catch (PDOException $e) {
        http_response_code(400);
        echo json_encode(array("mensagem" => "Parâmetros Inválidos"));
    }
} else {
    http_response_code(400);
    echo json_encode(array("mensagem" => "Não foram enviados parâmetros"));
}
?>