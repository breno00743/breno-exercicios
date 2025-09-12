<?php
session_start();
include "menu.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['vegetais'] = $_POST['vegetais'] ?? [];
    header("Location: molhos.php");
    exit;
}
?>
<h2>Escolha os vegetais</h2>
<form method="post">
    <input type="checkbox" name="vegetais[]" value="Alface"> Alface <br>
    <input type="checkbox" name="vegetais[]" value="Tomate"> Tomate <br>
    <input type="checkbox" name="vegetais[]" value="Cebola"> Cebola <br>
    <input type="checkbox" name="vegetais[]" value="Pepino"> Pepino <br>
    <button type="submit">Próximo</button>
</form>
