<?php
include("conexao.php");
session_start();
if (!isset($_SESSION["id"])) {
    echo "Você precisa estar logado. <a href='entrada.php'>Entrar</a>";
    exit;
}

if (!isset($_GET["id"])) {
    echo "Atividade não encontrada.";
    exit;
}

$id = intval($_GET["id"]);

// Busca a atividade
$sql = "SELECT a.*, u.usuario FROM atividades a 
        JOIN usuarios u ON a.usuario_id = u.id 
        WHERE a.id = $id";
$atividade = $con->query($sql)->fetch_assoc();

// Busca comentários/participações
$sql2 = "SELECT p.comentario, p.data_participacao, u.usuario
         FROM participacoes p
         JOIN usuarios u ON p.usuario_id = u.id
         WHERE p.atividade_id = $id
         ORDER BY p.data_participacao DESC";
$participacoes = $con->query($sql2);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Participar da Atividade</title>
</head>
<body>
    <h2><?= htmlspecialchars($atividade["titulo"]) ?></h2>
    <p><b>Criada por:</b> <?= htmlspecialchars($atividade["usuario"]) ?></p>
    <p><?= nl2br(htmlspecialchars($atividade["comentario"])) ?></p>
    <hr>

    <h3>Deixe seu comentário:</h3>
    <form action="salva_participacao.php" method="POST">
        <input type="hidden" name="atividade_id" value="<?= $atividade["id"] ?>">
        <textarea name="comentario" rows="4" cols="40" required></textarea><br><br>
        <input type="submit" value="Enviar comentário">
    </form>

    <h3>Participações:</h3>
    <?php
    if ($participacoes->num_rows > 0) {
        while ($p = $participacoes->fetch_assoc()) {
            echo "<b>" . htmlspecialchars($p["usuario"]) . "</b> em " . $p["data_participacao"] . "<br>";
            echo nl2br(htmlspecialchars($p["comentario"])) . "<hr>";
        }
    } else {
        echo "Ainda não há comentários nesta atividade.";
    }

    $con->close();
    ?>
</body>
</html>
