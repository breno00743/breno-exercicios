<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $raio = $_GET['raio'];
    $pi = pi();

    $area = $pi * ($raio * $raio);
    
    echo "<h3> A area é: " . number_format($area, 2, '.', ' ') . "</h3>";

    ?>
</body>
</html>
