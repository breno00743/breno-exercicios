<?php
    $capital = $_GET['capital'];
    $taxa = $_GET['taxa'];
    $tempo = $_GET['tempo'];

    $juros = $capital* ($taxa/100) * $tempo;
    $res = $capital + $juros;
    
    echo "<h2> a soma com o juros simples é : R$" . number_format($res, 2, '.', ' ') . "</h2>";
?>