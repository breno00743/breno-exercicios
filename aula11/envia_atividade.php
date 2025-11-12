<?php
session_start();
if (!isset($_SESSION["id"])) {
    echo "Você precisa estar logado. <a href='entrada.php'>Entrar</a>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Atividade</title>
</head>
<body>
    <h2>Criar nova atividade</h2>

    <form action="salva_atividade.php" method="POST">
        <label>Título da atividade:</label><br>
        <input type="text" name="titulo" required><br><br>

        <label>Comentário ou descrição:</label><br>
        <textarea name="comentario" rows="4" cols="40"></textarea><br><br>

        <input type="submit" value="Salvar atividade">
    </form>

    <p><a href="atividades.php">Ver atividades</a></p>
</body>
</html>
