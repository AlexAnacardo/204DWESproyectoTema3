<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Mostrar en tu página index la fecha y hora actual en Oporto formateada en portugués.</h1>
    </header>
    <?php
    /*
        Este no sale
    */
        date_default_timezone_set("Europe/Portugal");
        echo date('Y-m-d H:i:s', time());
        
        
    ?>
</body>
</html>