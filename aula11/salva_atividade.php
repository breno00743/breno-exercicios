<?php
include("conexao.php");
session_start();
if (!isset($_SESSION["id"])) {
    echo "Você precisa estar logado. <a href='entrada.php'>Entrar</a>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_SESSION["id"];
    $titulo = $_POST["titulo"];
    $comentario = $_POST["comentario"];

    $sql = "INSERT INTO atividades (usuario_id, titulo, comentario)
            VALUES ('$usuario_id', '$titulo', '$comentario')";

    if ($con->query($sql)) {
        echo "Atividade criada com sucesso!<br>";
        echo "<a href='atividades.php'>Ver atividades</a>";
    } else {
        echo "Erro ao salvar atividade: " . $con->error;
    }
}

$con->close();
?>
