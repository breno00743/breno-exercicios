<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "clube_escrita";

$con = new mysqli($servidor, $usuario, $senha, $banco);

if ($con->connect_error) {
    die("Erro na conexão: " . $con->connect_error);
}
?>
