<?php
include("conexao.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    
    $sql = "SELECT * FROM usuarios WHERE usuario='$login' OR email='$login'";
    $resultado = $con->query($sql);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

         
        if (password_verify($senha, $usuario["senha"])) {
            $_SESSION["id"] = $usuario["id"];
            $_SESSION["usuario"] = $usuario["usuario"];
            echo "Login realizado com sucesso!<br>";
            echo "Bem-vindo, " . $usuario["usuario"] . "!<br><br>";
            echo "<a href='envia_submissao.php'>Ir para Submissões</a>";
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }
}

$con->close();
?>
