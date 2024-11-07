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
     * @version 2024/10/1
     * @author Alex Asensio Sanchez                          
     */
        date_default_timezone_set("Europe/Lisbon");        
        echo("La fecha actual en Oporto es: ".date('j')." de ".date('F')." de ".date('Y')." y la hora es: ".date('H:i:s'));
        
        
    ?>
    <footer>
        <p><a href="../../index.html">Alex Asensio Sanchez</a></p>
        <p><a href="../indexProyectoTema3.php">Tema 3</a></p>
        <p><a target="blank" href="https://github.com/AlexAnacardo/204DWESProyectoTema3/tree/developer">GitHub del repositorio</a></p>
    </footer>
</body>
</html>