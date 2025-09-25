<?php
session_start();
require "conexao.php";

if (!isset($_SESSION['id'])) {
    header("Location: entrar.php");
    exit;
}

$idUsuario = $_SESSION['id'];
$nomeUsuario = $_SESSION['nome'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tarefa = $_POST['tarefa'];
    $prazo = $_POST['prazo'];

    $sql = "INSERT INTO tarefas (tarefa, prazo, usuario_id) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$tarefa, $prazo, $idUsuario]);
}

$sql = "SELECT * FROM tarefas WHERE usuario_id = ? AND prazo <= CURDATE()";
$stmt = $pdo->prepare($sql);
$stmt->execute([$idUsuario]);
$tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel</title>
</head>
<body>
  <h2>Olá, <?php echo htmlspecialchars($nomeUsuario); ?>!</h2>
  <a href="sair.php">Sair</a> | <a href="tarefas.php">Ver todas</a>

  <h3>Nova tarefa</h3>
  <form method="post">
    <input type="text" name="tarefa" placeholder="Nome da tarefa" required>
    <input type="date" name="prazo" required>
    <button type="submit">Salvar</button>
  </form>

  <h3>Tarefas até hoje</h3>
  <ul>
    <?php if ($tarefas): ?>
      <?php foreach ($tarefas as $t): ?>
        <li><?php echo htmlspecialchars($t['tarefa']); ?> (<?= $t['prazo'] ?>)</li>
      <?php endforeach; ?>
    <?php else: ?>
      <li>Nenhuma tarefa vencida 🎉</li>
    <?php endif; ?>
  </ul>
</body>
</html>
