<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifica Dados</title>
</head>
<body>
    <?php
    session_start();
    $emai = $_GET['email'];
    $senha = $_GET['senha'];

    $servername = 'localhost';
    $banco = 'opina';
    $username = 'root';
    $password = '';
    
    $conexao = new PDO("mysql:host=$servername;dbname=$banco", $username, $password);

    $comando = "SELECT `id`, `nome` FROM `usuarios` WHERE `email` LIKE '$email' AND `senha` LIKE '$senha'";

    $resultado = $conexao->query($comando);

    $linha = $resultado->fetch(PDO::FETCH_ASSOC);

    if($linha) {
	$_SESSION['id'] = $linha['id'];
	$_SESSION['nome'] = $linha['nome'];
	echo "Bem vindo, {$linha['nome']}";
    } else {
	echo "Usuário ou senha inválidos";
    }

 
    $_SESSION['id'] = $linha['id'];
    $_SESSION['nome'] = $linha['nome'];
    echo "Bem vindo, {$linha['nome']}";
    
    ?>  
    
</body>
</html>