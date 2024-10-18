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
    /*
     * @version 2024/10/1
     * @author Alex Asensio Sanchez                          
     */
        $fechaInicial = date_create(date('Y-m-d'));
        date_add($fechaInicial, date_interval_create_from_date_string('60 days'));
        echo ("La fecha dentro de 60 dias sera: ".date_format($fechaInicial, 'Y-m-d'));
    ?>
    <footer>
        <p><a href="../indexProyectoTema3.php">Alex Asensio Sanchez</a></p>
    </footer>
</body>
</html>