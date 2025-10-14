<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8" />
<title>Login</title>
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
        max-width: 350px;
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
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 8px 10px;
        margin-bottom: 18px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 15px;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }
    input[type="email"]:focus,
    input[type="password"]:focus {
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
    .cadastro-link {
        text-align: center;
        margin-top: 20px;
    }
    .cadastro-link a {
        color: #007BFF;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }
    .cadastro-link a:hover {
        color: #0056b3;
        text-decoration: underline;
    }
</style>
</head>
<body>

<h2>Login</h2>

<form action="valida_login.php" method="post">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" required>

    <input type="submit" value="Entrar">
</form>

<div class="cadastro-link">
    <a href="cadastro_usuario.php">Cadastrar usuário</a>
</div>

</body>
</html>
