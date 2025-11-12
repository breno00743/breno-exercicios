<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Enviar Submissão</title>
</head>
<body>
    <h2>Enviar nova submissão</h2>

    <form action="salva_submissao.php" method="POST" enctype="multipart/form-data">
        <label>Título:</label><br>
        <input type="text" name="titulo" required><br><br>

        <label>Descrição:</label><br>
        <textarea name="descricao" rows="4" cols="40"></textarea><br><br>

        <label>Arquivo (PDF ou TXT):</label><br>
        <input type="file" name="arquivo" required><br><br>

        <input type="submit" value="Enviar">
    </form>

    <p><a href="atividades.php">Ver atividades</a></p>
</body>
</html>
