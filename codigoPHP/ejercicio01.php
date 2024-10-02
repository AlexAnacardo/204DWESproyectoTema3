<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 01</title>
    </head>
    <body>
        <header>
            <h1>Hola mundo y phpinfo()</h1>
        </header>
        <p>
            <?php
            /*
             * Fecha de modificación 2024/10/1
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
                echo "Hola, mi nombre es ".$nombre." y tengo ".$edad." años <br>";
                echo 'la variable $cadena dice hola y es de tipo '.gettype($cadena)."<br>";                
                echo 'la variable $array es de tipo '.gettype($array)."<br>";
                echo 'la variable $booleano es de tipo '.gettype($booleano)."<br>";
                echo 'Una suma: '.$edad+$numeroSumar."<br>";
            ?>
        <h2>Utilizando la función Printf</h2>
            <?php
                printf("la variable cadena dice hola y es de tipo %s <br>", gettype($cadena));                   
                printf("la variable array es de tipo %s <br>", gettype($array));                
                printf("la variable booleano es de tipo %b <br>", gettype($booleano));                                
            ?>
        <h2>Utilizando la función print_r</h2>
            <?php
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
            <p><a href="../indexProyectoTema3.php">Alex Asensio Sanchez</a></p>
        </footer>
    </body>
</html>

