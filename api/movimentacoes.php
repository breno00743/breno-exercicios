<?php
include 'auten.php';
header('Content-Type: application/json');
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $id_produto = $data['id_produto'];

    
    $stmt_antes = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
    $stmt_antes->execute([$id_produto]);
    $produto_antes = $stmt_antes->fetch(PDO::FETCH_ASSOC);

    
    $alteracoes_log = [];
    if ($produto_antes['quantidade_estoque'] != $data['quantidade_estoque']) {
        $alteracoes_log[] = "Quantidade alterada de {$produto_antes['quantidade_estoque']} para {$data['quantidade_estoque']}.";
    }
    if ($produto_antes['ultimo_preco'] != $data['ultimo_preco']) {
        $alteracoes_log[] = "Preço alterado de {$produto_antes['ultimo_preco']} para {$data['ultimo_preco']}.";
    }
    if ($produto_antes['data_validade'] != $data['data_validade']) {
        $alteracoes_log[] = "Validade alterada de {$produto_antes['data_validade']} para {$data['data_validade']}.";
    }

    
    $sql_update = "UPDATE produtos SET quantidade_estoque = ?, ultimo_preco = ?, data_validade = ? WHERE id = ?";
    $stmt_update = $pdo->prepare($sql_update);
    $stmt_update->execute([$data['quantidade_estoque'], $data['ultimo_preco'], $data['data_validade'], $id_produto]);

    
    if (!empty($alteracoes_log)) {
        $descricao_log = implode(' ', $alteracoes_log);
        $sql_log = "INSERT INTO alteracoes (id_produto, id_usuario, alteracoes) VALUES (?, ?, ?)";
        $stmt_log = $pdo->prepare($sql_log);
        $stmt_log->execute([$id_produto, $id_usuario_logado, $descricao_log]);
    }
    
    echo json_encode(['status' => 'sucesso']);
}
?>