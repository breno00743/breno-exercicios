<?php
session_start();
include "menu.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['queijo'] = $_POST['queijo'];
    header("Location: vegetais.php");
    exit;
}
?>
<h2>Escolha o tipo de queijo</h2>
<form method="post">
    <select name="queijo" required>
        <option value="Mussarela">Mussarela</option>
        <option value="Prato">Prato</option>
        <option value="Cheddar">Cheddar</option>
    </select>
    <button type="submit">Próximo</button>
</form>
