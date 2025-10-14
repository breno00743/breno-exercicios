<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8" />
<title>Cadastro de Reclamação</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f0f4f8;
        margin: 0;
        padding: 20px;
    }
    h2 {
        color: #333;
        text-align: center;
        margin-bottom: 30px;
    }
    form {
        max-width: 450px;
        background: white;
        padding: 25px 30px;
        margin: 0 auto;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: #555;
    }
    input[type="text"],
    textarea,
    input[type="file"] {
        width: 100%;
        padding: 8px 10px;
        margin-bottom: 18px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 15px;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }
    textarea {
        resize: vertical;
        height: 100px;
    }
    input[type="text"]:focus,
    textarea:focus,
    input[type="file"]:focus {
        border-color: #007BFF;
        outline: none;
    }
    input[type="submit"] {
        width: 100%;
        background-color: #007BFF;
        color: white;
        padding: 12px 0;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover {
        background-color: #0056b3;
    }
    .voltar-link {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: #007BFF;
        text-decoration: none;
        font-weight: 600;
    }
    .voltar-link:hover {
        text-decoration: underline;
        color: #0056b3;
    }
</style>
</head>
<body>

<h2>Cadastro de Reclamação</h2>

<form action="salva_reclamacao.php" method="post" enctype="multipart/form-data">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo" required>

    <label for="descricao">Descrição:</label>
    <textarea name="descricao" id="descricao" required></textarea>

    <label for="foto">Foto:</label>
    <input type="file" name="foto" id="foto" accept="image/*" required>

    <input type="submit" value="Enviar Reclamação">
</form>

<a href="painel.php" class="voltar-link">Voltar</a>

</body>
</html>
