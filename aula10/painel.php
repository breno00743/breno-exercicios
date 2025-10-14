<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$nome = $_SESSION['nome'];
$tipo = $_SESSION['tipo'];  
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Painel</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 0; padding: 20px;
    }
    h2 {
        color: #333;
        border-bottom: 2px solid #007BFF;
        padding-bottom: 10px;
    }
    ul {
        list-style-type: none;
        padding-left: 0;
        margin-top: 20px;
        max-width: 300px;
    }
    ul li {
        margin-bottom: 12px;
    }
    ul li a {
        text-decoration: none;
        background-color: #007BFF;
        color: white;
        padding: 10px 15px;
        display: block;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        font-weight: bold;
    }
    ul li a:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
    <h2>Bem-vindo, <?= htmlspecialchars($nome) ?>!</h2>

    <ul>
        <li><a href="minhas_reclamacoes.php">Minhas Reclamações</a></li>
        <li><a href="cadastro_reclamacao.php">Cadastrar Reclamação</a></li>
        <li><a href="todas_reclamacoes.php">Ver Todas as Reclamações</a></li>

        <?php if ($tipo === 'admin'): ?>
            <li><a href="admin_reclamacoes.php">Administração de Reclamações</a></li>
        <?php endif; ?>

        <li><a href="sair.php" style="background-color:#dc3545;

