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
    /*
     * @version 2024/10/1
     * @author Alex Asensio Sanchez                          
     */
        echo(basename($_SERVER['PHP_SELF']));        
    ?>
    <footer>
        <p><a href="../indexProyectoTema3.php">Alex Asensio Sanchez</a></p>
    </footer>
</body>
</html>