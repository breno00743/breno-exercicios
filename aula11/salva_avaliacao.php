<?php
include("conexao.php");
session_start();
if (!isset($_SESSION["id"])) {
    echo "Você precisa estar logado. <a href='entrada.php'>Entrar</a>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submissao_id = $_POST["submissao_id"];
    $usuario_id = $_SESSION["id"];
    $aprovado = $_POST["aprovado"];
    $comentario = $_POST["comentario"];

    $sql = "INSERT INTO avaliacoes (submissao_id, usuario_id, aprovado, comentario)
            VALUES ('$submissao_id', '$usuario_id', '$aprovado', '$comentario')";

    if ($con->query($sql)) {
        echo "Avaliação salva com sucesso!<br>";
        echo "<a href='submissoes.php'>Voltar para submissões</a>";
    } else {
        echo "Erro ao salvar: " . $con->error;
    }
}

$con->close();
?>
