  <?php  
$x = $_GET['numero1'];
$y = $_GET['numero2'];
$z = $x / $y;
echo " o resultado da divisao é: " . number_format($z, 0 , ', ' );
?>  