<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrp de Produtos</title>
</head>
<body>
    <?php
    session_start();
    echo "Olá, {$_session['nome']}."
    ?>
    <h1>Dados do Produto:</h1>
    <form action="recebe_produto.php">
        <label for="">Nome do Produto:</label>
        <input type="text" name="nome"><br>
        <input type="submit">
    

    </form>
    
</body>
</html>