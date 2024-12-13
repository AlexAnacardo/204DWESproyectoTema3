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
        <h1>Contenido de variables superglobales</h1>
    </header>
    <?php
    /*
     * @version 2024/10/3
     * @author Alex Asensio Sanchez                          
     */
        echo('<h3>Variable $_GLOBALS</h3>');
        print_r($_GLOBALS);
        echo("<br>  <br>");
        foreach($_GLOBALS as $valor){
            echo($valor);
        }
        echo('<h3>Variable $_SERVER</h3>');
        print_r($_SERVER);
        echo("<br>  <br>");
        foreach($_SERVER as $valor){
            echo($valor);
        }
        echo('<h3>Variable $_GET</h3>');
        print_r($_GET);
        echo("<br>  <br>");
        foreach($_GET as $valor){
            echo($valor);
        }
        echo('<h3>Variable $_POST</h3>');
        print_r($_POST);
        echo("<br>  <br>");
        foreach($_POST as $valor){
            echo($valor);
        }
        echo('<h3>Variable $_FILES</h3>');
        print_r($_FILES);
        echo("<br>  <br>");
        foreach($_FILES as $valor){
            echo($valor);
        }
        echo('<h3>Variable $_COOKIE</h3>');
        print_r($_COOKIE);
        echo("<br>  <br>");
        foreach($_COOKIE as $valor){
            echo($valor);
        }
        echo('<h3>Variable $_SESSION</h3>');
        print_r($_SESSION);
        echo("<br>  <br>");
        foreach($_SESSION as $valor){
            echo($valor);
        }
        echo('<h3>Variable $_REQUEST</h3>');
        print_r($_REQUEST);
        echo("<br>  <br>");
        foreach($_REQUEST as $valor){
            echo($valor);
        }
        echo('<h3>Variable $_ENV</h3>');
        print_r($_ENV);
        echo("<br>  <br>");
        foreach($_ENV as $valor){
            echo($valor);
        }
    ?>
    <footer>
        <p><a href="../../index.html">Alex Asensio Sanchez</a></p>
        <p><a href="../indexProyectoTema3.php">Tema 3</a></p>
        <p><a target="blank" href="https://github.com/AlexAnacardo/204DWESProyectoTema3/tree/developer">GitHub del repositorio</a></p>
    </footer>
</body>
</html>