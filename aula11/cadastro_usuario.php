<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h2>Cadastro de Usuário</h2>

    <form action="salva_usuario.php" method="POST">
        <label>Nome completo:</label><br>
        <input type="text" name="nome_completo" required><br><br>

        <label>Usuário:</label><br>
        <input type="text" name="usuario" required><br><br>

        <label>E-mail:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Data de nascimento:</label><br>
        <input type="date" name="data_nascimento" required><br><br>

        <label>CPF:</label><br>
        <input type="text" name="cpf" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="senha" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>

    <p><a href="entrada.php">Já tem conta? Entrar</a></p>
</body>
</html>
