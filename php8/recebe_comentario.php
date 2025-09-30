<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>salva comentario</title>
</head>
<body>
    <?php
     $servername = 'localhost';
     $banco = 'opina';
     $username = 'root';
     $password = '';
 
    $conexao = new PDO("mysql:host=$servername;dbname=$banco", $username, $password);

    $id_produto = $_GET['id'];
    $comentario = $_GET['comentario']
    
    session_start();
    $id_produto = $_SESSION['id'];


    $comando = "INSERT INTO `comentarios` (`id`, `comentario`, `id_produto`, `id_comentador`) VALUES (NULL, '$comentario', '$id_produto', '$id_usuario')";

        
    $sth = $conexao->prepare($comando);


    $resultado = $sth->execute();


    if($resultado) {
    echo "Comentário  salvo com sucesso!";
    } else {
    echo "Erro ao salvar o Comentário.";
    }


    ?>
    
</body>
</html>