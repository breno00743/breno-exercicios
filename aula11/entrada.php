<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Clube de Escrita</title>
</head>
<body>
    <h2>Login</h2>

    <form action="busca_usuario.php" method="POST">
        <label>Usuário ou E-mail:</label><br>
        <input type="text" name="login" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="senha" required><br><br>

        <input type="submit" value="Entrar">
    </form>

    <p><a href="cadastro_usuario.php">Ainda não tem conta? Cadastre-se</a></p>
</body>
</html>
