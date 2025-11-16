<?php

include("../../20251009/config/database.php");

// Usa a mesma classe Database para falar com o MySQL
$database = new Database();

// Cabeçalhos que tornam o endpoint JSON acessível a outros domínios
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // GET lista todos os usuários cadastrados
    $usuarios = $database->read("usuarios");
    if ($usuarios["success"] !== false) {
        echo json_encode(['success' => true, 'data' => $usuarios, 'message' => 'Usuários recuperados com sucesso'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode(['success' => false, 'data' => null, 'message' => 'Erro ao recuperar usuários'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // POST espera um campo "tipo" para saber qual ação executar
    $input = $_POST;

    switch ($_POST["tipo"]) {
        case 'insert':
            // Cadastro simples de usuário com senha criptografada em MD5
            $resposta = $database->create('usuarios', ["nome" => $input["nome"], "email" => $input["email"], "senha" => md5($input["senha"]), "idade" => $input["idade"], "cidade" => $input["cidade"]]);

            if ($resposta["success"] !== false) {
                echo json_encode(["success" => true, "data" => $resposta, "message" => "Usuário inserido com sucesso"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode(["success" => false, "data" => null, "message" => $resposta["message"]], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            }
            exit();
        case 'update':
            // Espaço reservado para atualizar usuários
            exit();
        case 'delete':
            // Espaço reservado para excluir usuários
            exit();
    }

}


?>
