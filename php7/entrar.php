<?php
session_start();
require "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$usuario]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($senha, $user['senha'])) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['nome'] = $user['nome'];
        header("Location: painel.php");
        exit;
    } else {
        $msg = "❌ Usuário ou senha inválidos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Entrar</title>
</head>
<body>
  <h2>Login</h2>
  <?php if (!empty($msg)) echo "<p>$msg</p>"; ?>
  <form method="post">
    Usuário: <input type="text" name="usuario" required><br>
    Senha: <input type="password" name="senha" required><br>
    <button type="submit">Entrar</button>
  </form>
  <a href="registrar.php">Criar conta</a>
</body>
</html>
