<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 01</title>
    </head>
    <body>
        <header>
            <h1>Inicializar variables de los distintos tipos de datos básicos(string, int, float, bool) y mostrar los datos por pantalla (echo, print, printf, print_r,var_dump)</h1>
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
        <p>
            <?php
                /*Hola, hoy es 2 de octubre de 2024 y son las xx:xx horas en benavente, las xx:xx en Oporto, naci el DD de MES de AÑO y por tanto tengo
                XX años que es lo mismo que xx dias. El 1 de enero de 2050 tendre XX años*/
            
                
                $oFechaActual=new DateTime('now', new DateTimeZone("Europe/Madrid")); 
                $oFechaNacimiento=new DateTime("2004-07-19");
                echo("Hola, hoy es ".$oFechaActual->format("j")." de ".$oFechaActual->format("F")." de".$oFechaActual->format("Y"));
                $oFechaActual->setTimezone(new DateTimeZone("Europe/Lisbon"));
                echo(" y son las".$oFechaActual->format("H").":".$oFechaActual->format("i")." horas en benavente, las ".$oFechaActual->format("H").":".$oFechaActual->format("i")." en Oporto. <br>");
                echo("Naci el ".$oFechaNacimiento->format("j")." de ".$oFechaNacimiento->format("F")." de ".$oFechaNacimiento->format("Y")." y por tanto tengo ".($oFechaActual->diff($oFechaNacimiento))->format("%y")." años, que es lo mismo que x dias. <br>");
                echo("El 1 de enero de 2050 tendre ".($oFechaNacimiento->diff(new DateTime("2050-07-19")))->format("%y")." años");
            ?>
        </p>
        <footer>
            <p><a href="../indexProyectoTema3.php">Alex Asensio Sanchez</a></p>
        </footer>
    </body>
</html>

