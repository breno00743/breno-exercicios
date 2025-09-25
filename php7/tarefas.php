<?php
session_start();
require "conexao.php";

if (!isset($_SESSION['id'])) {
    header("Location: entrar.php");
    exit;
}

$idUsuario = $_SESSION['id'];
$nomeUsuario = $_SESSION['nome'];

$sql = "SELECT * FROM tarefas WHERE usuario_id = ? ORDER BY prazo ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute([$idUsuario]);
$todas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Todas as Tarefas</title>
</head>
<body>
  <h2>Todas as tarefas de <?php echo htmlspecialchars($nomeUsuario); ?></h2>
  <a href="painel.php">Voltar</a>
  <ul>
    <?php if ($todas): ?>
      <?php foreach ($todas as $t): ?>
        <li><?php echo htmlspecialchars($t['tarefa']); ?> - <?= $t['prazo'] ?></li>
      <?php endforeach; ?>
    <?php else: ?>
      <li>Nenhuma tarefa registrada 📭</li>
    <?php endif; ?>
  </ul>
</body>
</html>
