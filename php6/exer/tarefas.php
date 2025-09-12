<?php
session_start();

if (!isset($_SESSION['tarefas'])) {
    $_SESSION['tarefas'] = [];
}

// Adicionar tarefa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo']);
    $data   = $_POST['data'];

    if ($titulo !== '' && $data !== '') {
        $_SESSION['tarefas'][] = [
            'titulo' => $titulo,
            'data'   => $data
        ];
    }
    header("Location: app.php?p=todas");
    exit;
}

// Excluir tarefa
if (isset($_GET['acao']) && $_GET['acao'] === 'excluir') {
    $id = $_GET['id'] ?? null;
    if ($id !== null && isset($_SESSION['tarefas'][$id])) {
        unset($_SESSION['tarefas'][$id]);
        $_SESSION['tarefas'] = array_values($_SESSION['tarefas']); // reorganiza índices
    }
    header("Location: app.php?p=todas");
    exit;
}

// fallback
header("Location: app.php");
exit;
