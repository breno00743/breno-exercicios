<?php
session_start();

if (!isset($_SESSION['tarefas'])) {
    $_SESSION['tarefas'] = [];
}

$pagina = $_GET['p'] ?? 'hoje';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="app.php">Tarefas</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="app.php?p=hoje">Hoje</a></li>
                <li class="nav-item"><a class="nav-link" href="app.php?p=adicionar">Nova</a></li>
                <li class="nav-item"><a class="nav-link" href="app.php?p=todas">Todas</a></li>
            </ul>
            <span class="navbar-text">
                Total: <?= count($_SESSION['tarefas']) ?>
            </span>
        </div>
    </div>
</nav>

<div class="container mt-4">

<?php if ($pagina === 'adicionar'): ?>
    <h2>Nova Tarefa</h2>
    <form method="post" action="processa.php">
        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Data</label>
            <input type="date" name="data" class="form-control" required>
        </div>
        <button class="btn btn-success">Salvar</button>
    </form>

<?php elseif ($pagina === 'hoje'): ?>
    <?php $dataHoje = date('Y-m-d'); ?>
    <h2>Tarefas de Hoje (<?= date('d/m/Y') ?>)</h2>
    <ul class="list-group">
        <?php
        $achou = false;
        foreach ($_SESSION['tarefas'] as $id => $tarefa) {
            if ($tarefa['data'] === $dataHoje) {
                $achou = true;
                echo "<li class='list-group-item d-flex justify-content-between'>
                        " . htmlspecialchars($tarefa['titulo']) . "
                        <a href='processa.php?acao=excluir&id={$id}' class='btn btn-sm btn-danger'>Remover</a>
                      </li>";
            }
        }
        if (!$achou) {
            echo "<p class='text-muted'>Nenhuma tarefa para hoje.</p>";
        }
        ?>
    </ul>

<?php else: ?>
    <h2>Todas as Tarefas</h2>
    <ul class="list-group">
        <?php
        if (empty($_SESSION['tarefas'])) {
            echo "<p class='text-muted'>Nenhuma tarefa cadastrada.</p>";
        } else {
            foreach ($_SESSION['tarefas'] as $id => $tarefa) {
                $dataFormatada = date('d/m/Y', strtotime($tarefa['data']));
                echo "<li class='list-group-item d-flex justify-content-between'>
                        " . htmlspecialchars($tarefa['titulo']) . " <small>($dataFormatada)</small>
                        <a href='processa.php?acao=excluir&id={$id}' class='btn btn-sm btn-danger'>Remover</a>
                      </li>";
            }
        }
        ?>
    </ul>
<?php endif; ?>

</div>
</body>
</html>
