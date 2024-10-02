<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Inicializar y mostrar una variable que tiene una marca de tiempo (timestamp)</h1>
    </header>
    <?php
        $fecha = new DateTime();
        echo $fecha->getTimestamp();        
    ?>
</body>
</html>