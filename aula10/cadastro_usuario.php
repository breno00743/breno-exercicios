<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8" />
<title>Cadastro de Usuário</title>
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
        max-width: 400px;
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
    input[type="email"],
    input[type="password"],
    input[type="date"],
    select {
        width: 100%;
        padding: 8px 10px;
        margin-bottom: 18px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 15px;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }
    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus,
    input[type="date"]:focus,
    select:focus {
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
</style>
</head>
<body>

<h2>Cadastro de Usuário</h2>

<form action="salva_usuario.php" method="post">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" required>

    <label for="cpf">CPF:</label>
    <input type="text" name="cpf" id="cpf" required placeholder="Digite apenas números">

    <label for="nascimento">Nascimento:</label>
    <input type="date" name="nascimento" id="nascimento" required>

    <label for="tipo">Tipo:</label>
    <select name="tipo" id="tipo" required>
        <option value="" disabled selected>Selecione o tipo</option>
        <option value="usuario">Usuário</option>
        <option value="admin">Administrador</option>
    </select>

    <input type="submit" value="Cadastrar">
</form>

</body>
</html>
