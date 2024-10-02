<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Operar con fechas: calcular la fecha y el día de la semana de dentro de 60 días</h1>
    </header>
    <?php    
        $fechaInicial = date_create(date('Y-m-d'));
        date_add($fechaInicial, date_interval_create_from_date_string('60 days'));
        echo date_format($fechaInicial, 'Y-m-d');    
    ?>
</body>
</html>