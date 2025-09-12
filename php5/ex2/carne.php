<?php
session_start();
include "menu.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['carne'] = $_POST['carne'];
    header("Location: queijo.php");
    exit;
}
?>
<h2>Escolha a proteína</h2>
<form method="post">
    <input type="radio" name="carne" value="Carne" required> Carne <br>
    <input type="radio" name="carne" value="Frango"> Frango <br>
    <button type="submit">Próximo</button>
</form>
