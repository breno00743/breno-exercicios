<?php
session_start();
include "menu.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['pao'] = $_POST['pao'];
    header("Location: carne.php");
    exit;
}
?>
<h2>Escolha o tipo de pão</h2>
<form method="post">
    <select name="pao" required>
        <option value="Francês">Francês</option>
        <option value="Integral">Integral</option>
        <option value="Australiano">Australiano</option>
    </select>
    <button type="submit">Próximo</button>
</form>
