<?php
session_start();
include "menu.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['molhos'] = $_POST['molhos'] ?? [];
    header("Location: pagamento.php");
    exit;
}
?>
<h2>Escolha os molhos</h2>
<form method="post">
    <input type="checkbox" name="molhos[]" value="Maionese"> Maionese <br>
    <input type="checkbox" name="molhos[]" value="Mostarda"> Mostarda <br>
    <input type="checkbox" name="molhos[]" value="Barbecue"> Barbecue <br>
    <button type="submit">Próximo</button>
</form>
