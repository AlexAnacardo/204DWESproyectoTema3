<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Mostrar el nombre del fichero que se está ejecutando</h1>
    </header>
    <?php
        echo(basename(__FILE__));
        //usar var local
    ?>
</body>
</html>