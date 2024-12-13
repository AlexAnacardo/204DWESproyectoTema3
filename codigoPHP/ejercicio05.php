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
        <h1>Inicializar y mostrar una variable que tiene una marca de tiempo (timestamp)</h1>
    </header>
    <main>
        <?php
        /*
         * @version 2024/10/1
         * @author Alex Asensio Sanchez                          
         */
            $fecha = new DateTime();
            echo ("Han pasado ".$fecha->getTimestamp()." segundos desde el 1 de enero de 1970");
        ?>
    </main>
    <footer>
        <p><a href="../../index.html">Alex Asensio Sanchez</a></p>
        <p><a href="../indexProyectoTema3.php">Tema 3</a></p>
        <p><a target="blank" href="https://github.com/AlexAnacardo/204DWESProyectoTema3/tree/developer">GitHub del repositorio</a></p>
    </footer>
</body>
</html>