<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastri de usuario</title>
</head>
<body>
    <?php
                if(isset($_GET['id'])){
                ?>
                    <?php
                        $id_prod = $_GET['id'];
                        echo "Produto: {$id_prod}."
                    ?>
                    <input type="hidden" name="id_produto" value='<?=$_GET['id']?>'><br>
                <?php
                } else {
                ?>
                    <label for="">ID Produto:</label>
                    <input type="text" name="id_produto"><br>
                <?php
                }   
    ?>
    
        <form action="recebe_comentario.php" method="post">
        <label for="">ID produto:</label>
        <input type="text" name='id_produto'><br>
        <label for="">Comentário:</label>
        <input type="text" name='comentario'><br>
        <input type="submit">
</body>
</html>