<?php
include("conexao.php");
session_start();
if (!isset($_SESSION["id"])) {
    echo "Você precisa estar logado. <a href='entrada.php'>Entrar</a>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $atividade_id = $_POST["atividade_id"];
    $usuario_id = $_SESSION["id"];
    $comentario = $_POST["comentario"];

    $sql = "INSERT INTO participacoes (atividade_id, usuario_id, comentario)
            VALUES ('$atividade_id', '$usuario_id', '$comentario')";

    if ($con->query($sql)) {
        echo "Comentário enviado com sucesso!<br>";
        echo "<a href='participa_atividade.php?id=$atividade_id'>Voltar</a>";
    } else {
        echo "Erro ao enviar comentário: " . $con->error;
    }
}

$con->close();
?>
