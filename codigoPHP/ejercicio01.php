<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 01</title>
        <link rel="stylesheet" href="../webroot/css/ejercicio21.css">
    </head>
    <body>
        <header>
            <h1>Inicializar variables y mostrar los datos por pantalla</h1>
        </header>
        <p>
            <?php
            /*
             * @version 2024/10/1
             * @author Alex Asensio Sanchez
             * 
             * Jugando con variables y mostrar por pantalla
             */
                $cadena="hola";
                $nombre="alex";
                $edad=20; 
                $numeroSumar=15;
                $array= array("Hola", "mundo");
                $booleano=true;
                ?>
        <h2>Utilizando la función Echo</h2>
            <?php                           
                echo 'la variable $cadena es de tipo '.gettype($cadena)." y tiene el valor ".$cadena."<br>";                
                echo 'la variable $array es de tipo '.gettype($array)."<br>";
                echo 'la variable $booleano es de tipo '.gettype($booleano)." y tiene el valor ".$booleano."<br>";
                echo 'Una suma: '.$edad+$numeroSumar."<br>";
            ?>
        <h2>Utilizando la función Printf</h2>
            <?php
                printf("la variable cadena dice hola y es de tipo %s <br>", gettype($cadena));                   
                printf("la variable array es de tipo %s <br>", gettype($array));                
                printf("la variable booleano es de tipo %b <br>", is_bool($booleano));                                
            ?>
        <h2>Utilizando la función print_r</h2>
            <?php
                print_r('La variable $cadena dice '.$cadena.' y es de tipo '.gettype($cadena)."<br>");
                print_r('La variable $array es de tipo '.gettype($array)."<br>");
                print_r('La variable $booleano dice '.$booleano.' y es de tipo '.gettype($booleano)."<br>");
                print_r($array);                
            ?>
        <h2>Utilizando la función Var_dump</h2>
            <?php
                echo var_dump($nombre), "<br>",
                var_dump($edad),
                "<br>",
                var_dump($array)
            ?>
        </p>        
        <footer>
            <p><a href="../../index.html">Alex Asensio Sanchez</a></p>
            <p><a href="../indexProyectoTema3.php">Tema 3</a></p>
            <p><a target="blank" href="https://github.com/AlexAnacardo/204DWESProyectoTema3/tree/developer">GitHub del repositorio</a></p>
        </footer>
    </body>
</html>

