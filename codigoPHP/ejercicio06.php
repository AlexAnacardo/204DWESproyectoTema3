<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../webroot/css/ejercicio01.css">
</head>
<body>
    <header>
        <h1>Operar con fechas: calcular la fecha y el día de la semana de dentro de 60 días</h1>
    </header>
    <main>
        <?php
        /*
         * @version 2024/10/1
         * @author Alex Asensio Sanchez                          
         */
            $fechaInicial = date_create(date('Y-m-d'));
            date_add($fechaInicial, date_interval_create_from_date_string('60 days'));
            echo ("La fecha dentro de 60 dias sera: ".date_format($fechaInicial, 'Y-m-d'));
        ?>
    </main>
    <footer>
        <p><a href="../../index.html">Alex Asensio Sanchez</a></p>
        <p><a href="../indexProyectoTema3.php">Tema 3</a></p>
        <p><a target="blank" href="https://github.com/AlexAnacardo/204DWESProyectoTema3/tree/developer">GitHub del repositorio</a></p>
    </footer>
</body>
</html>