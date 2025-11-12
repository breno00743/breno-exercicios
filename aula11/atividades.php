<?php
include("conexao.php");
session_start();
if (!isset($_SESSION["id"])) {
    echo "Você precisa estar logado. <a href='entrada.php'>Entrar</a>";
    exit;
}

// Lista todas as atividades
$sql = "SELECT a.id, a.titulo, a.comentario, a.data_criacao, u.usuario
        FROM atividades a
        JOIN usuarios u ON a.usuario_id = u.id
        ORDER BY a.data_criacao DESC";

$atividades = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atividades</title>
</head>
<body>
    <h2>Atividades</h2>

    <p><a href="envia_atividade.php">Criar nova atividade</a></p>

    <?php
    if ($atividades->num_rows > 0) {
        while ($a = $atividades->fetch_assoc()) {
            echo "<b>Título:</b> " . htmlspecialchars($a["titulo"]) . "<br>";
            echo "<b>Criador:</b> " . htmlspecialchars($a["usuario"]) . "<br>";
            echo "<b>Comentário:</b> " . nl2br(htmlspecialchars($a["comentario"])) . "<br>";
            echo "<a href='participa_atividade.php?id=" . $a["id"] . "'>Ver/Participar</a>";
            echo "<hr>";
        }
    } else {
        echo "Nenhuma atividade encontrada.";
    }

    $con->close();
    ?>
</body>
</html>
