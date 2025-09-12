<?php
session_start();
include "menu.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['pagamento'] = $_POST['pagamento'];
    header("Location: resumo.php");
    exit;
}
?>
<h2>Forma de pagamento</h2>
<form method="post">
    <input type="radio" name="pagamento" value="Pix" required> Pix <br>
    <input type="radio" name="pagamento" value="Cartão"> Cartão <br>
    <button type="submit">Próximo</button>
</form>
