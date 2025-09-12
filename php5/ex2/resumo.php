<?php
session_start();
include "menu.php";

echo "<h2>Resumo do Pedido</h2>";

if (isset($_SESSION['local'])) echo "Local: " . $_SESSION['local'] . "<br>";
if (isset($_SESSION['pao'])) echo "Pão: " . $_SESSION['pao'] . "<br>";
if (isset($_SESSION['carne'])) echo "Proteína: " . $_SESSION['carne'] . "<br>";
if (isset($_SESSION['queijo'])) echo "Queijo: " . $_SESSION['queijo'] . "<br>";

if (!empty($_SESSION['vegetais'])) {
    echo "Vegetais: " . implode(", ", $_SESSION['vegetais']) . "<br>";
}
if (!empty($_SESSION['molhos'])) {
    echo "Molhos: " . implode(", ", $_SESSION['molhos']) . "<br>";
}
if (isset($_SESSION['pagamento'])) echo "Pagamento: " . $_SESSION['pagamento'] . "<br>";

echo "<br><a href='index.php'>Novo Pedido</a>";
?>
