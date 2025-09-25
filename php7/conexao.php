<?php
$host = "localhost";
$dbname = "ctsite";
$user = "root";   // troque se tiver outro usuário
$pass = "";       // coloque sua senha do MySQL se tiver

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar no banco: " . $e->getMessage());
}
