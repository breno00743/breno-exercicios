<?php
require "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $nome = $_POST['nome'];

    $sql = "INSERT INTO usuarios (usuario, senha, nome) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$usuario, $senha, $nome]);
        $msg = "✅ Usuário registrado! <a href='entrar.php'>Entrar</a>";
    } catch (PDOException $e) {
        $msg = "❌ Erro: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Registrar</title>
</head>
<body>
  <h2>Criar conta</h2>
  <?php if (!empty($msg)) echo "<p>$msg</p>"; ?>
  <form method="post">
    Usuário: <input type="text" name="usuario" required><br>
    Senha: <input type="password" name="senha" required><br>
    Nome: <input type="text" name="nome" required><br>
    <button type="submit">Registrar</button>
  </form>
  <a href="entrar.php">Já tenho conta</a>
</body>
</html>
