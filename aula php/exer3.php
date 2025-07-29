  <?php  
$pi = pi();  
$raio = $_POST['raio'];
$area = $pi * ($raio * $raio);
echo " a área é: " . number_format($area, 2 , ', ' );
?>  