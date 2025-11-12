<?php
include("conexao.php");
session_start();
if (!isset($_SESSION["id"])) {
    echo "Você precisa estar logado. <a href='entrada.php'>Entrar</a>";
    exit;
}

$id = $_SESSION["id"];
$sql = "SELECT * FROM submissao WHERE usuario_id='$id' ORDER BY data_submissao DESC";
$resultado = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Minhas Submissões</title>
</head>
<body>
    <h2>Minhas Submissões</h2>

    <a href="envia_submissao.php">Nova Submissão</a><br><br>

    <?php
    if ($resultado->num_rows > 0) {
        while ($linha = $resultado->fetch_assoc()) {
            echo "<b>Título:</b> " . htmlspecialchars($linha["titulo"]) . "<br>";
            echo "<b>Data:</b> " . $linha["data_submissao"] . "<br>";
            echo "<b>Observações:</b> " . nl2br(htmlspecialchars($linha["observacoes"])) . "<br>";
            echo "<a href='" . $linha["arquivo"] . "' target='_blank'>Abrir arquivo</a>";
            echo "<hr>";
        }
    } else {
        echo "Você ainda não enviou nenhuma submissão.";
    }

    $con->close();
    ?>
</body>
</html>
