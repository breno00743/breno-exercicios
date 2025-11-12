<?php
include("conexao.php");
session_start();
if (!isset($_SESSION["id"])) {
    echo "Você precisa estar logado. <a href='entrada.php'>Entrar</a>";
    exit;
}

if (!isset($_GET["id"])) {
    echo "Submissão não especificada.";
    exit;
}

$id = intval($_GET["id"]);
$sql = "SELECT s.*, u.usuario 
        FROM submissao s 
        JOIN usuarios u ON s.usuario_id = u.id 
        WHERE s.id = $id";
$resultado = $con->query($sql);
$submissao = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Avaliar Submissão</title>
</head>
<body>
    <h2>Avaliar Submissão</h2>

    <?php if ($submissao): ?>
        <p><b>Título:</b> <?= htmlspecialchars($submissao["titulo"]) ?></p>
        <p><b>Autor:</b> <?= htmlspecialchars($submissao["usuario"]) ?></p>
        <p><b>Observações:</b> <?= nl2br(htmlspecialchars($submissao["observacoes"])) ?></p>
        <p><a href="<?= $submissao["arquivo"] ?>" target="_blank">Abrir arquivo enviado</a></p>

        <hr>

        <form action="salva_avaliacao.php" method="POST">
            <input type="hidden" name="submissao_id" value="<?= $submissao["id"] ?>">

            <label>Aprovar?</label><br>
            <input type="radio" name="aprovado" value="1" required> Sim<br>
            <input type="radio" name="aprovado" value="0"> Não<br><br>

            <label>Comentário:</label><br>
            <textarea name="comentario" rows="4" cols="40"></textarea><br><br>

            <input type="submit" value="Salvar Avaliação">
        </form>
    <?php else: ?>
        <p>Submissão não encontrada.</p>
    <?php endif; ?>
</body>
</html>
