<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recebe imagem</title>
</head>
<body>
    <?php
    $nome_arquivo = $_FILES['figura']['name'];

    $atual = $_FILES['figura']["tmp_name"];

    $destino = 'foto/' . $nome_arquivo;

    $resultado = move_uploaded_file($atual, $destino);

    if($resultado) {
        echo "Arquivo recebido com sucesso!";
    } else {
        echo "Erro ao enviar o arquivo!";
    }
    
    echo "<img src='$destino' width='80px'>";
    ?>
</body>
</html>