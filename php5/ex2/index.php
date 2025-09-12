<?php
session_start();
include "menu.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['local'] = $_POST['local'];
    header("Location: pao.php");
    exit;
}
?>
<h2>Você vai levar ou comer no local?</h2>
<form method="post">
    <input type="radio" name="local" value="Levar" required> Levar <br>
    <input type="radio" name="local" value="Comer no local"> Comer no local <br>
    <button type="submit">Próximo</button>
</form>
