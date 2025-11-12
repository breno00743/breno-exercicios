<?php
include("conexao.php");
session_start();
if (!isset($_SESSION["id"])) {
    echo "Você precisa estar logado. <a href='entrada.php'>Entrar</a>";
    exit;
}

$sql = "SELECT s.id, s.titulo, s.data_submissao, u.usuario 
        FROM submissao s 
        JOIN usuarios u ON s.usuario_id = u.id 
        ORDER BY s.data_submissao DESC";

$resultado = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Todas as Submissões</title>
</head>
<body>
    <h2>Lista de Submissões</h2>

    <p><a href="envia_submissao.php">Enviar nova submissão</a></p>

    <?php
    if ($resultado->num_rows > 0) {
        while ($linha = $resultado->fetch_assoc()) {
            echo "<b>Título:</b> " . htmlspecialchars($linha["titulo"]) . "<br>";
            echo "<b>Autor:</b> " . htmlspecialchars($linha["usuario"]) . "<br>";
            echo "<b>Data:</b> " . $linha["data_submissao"] . "<br>";
            echo "<a href='avalia_submissao.php?id=" . $linha["id"] . "'>Avaliar</a>";
            echo "<hr>";
        }
    } else {
        echo "Nenhuma submissão encontrada.";
    }

    $con->close();
    ?>
</body>
</html>
