<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 03</title>
    </head>
    <body>
        <header>
            <h1>Hola mundo y phpinfo()</h1>
        </header>
        <p>
            <?php 
            /*
             * @version 2024/10/1
             * @author Alex Asensio Sanchez                          
             */
                
            
            /*Hola, hoy es 2 de octubre de 2024 y son las xx:xx horas en benavente, las xx:xx en Oporto, naci el DD de MES de AÑO y por tanto tengo
            XX años que es lo mismo que xx dias. El 1 de enero de 2050 tendre XX años*/                
                
                $oFechaActual=new DateTime('now', new DateTimeZone("Europe/Madrid")); 
                $oFechaNacimiento=new DateTime("2004-07-19", new DateTimeZone("Europe/Madrid"));
                echo("Hola, hoy es ".$oFechaActual->format("j")." de ".$oFechaActual->format("F")." de ".$oFechaActual->format("Y"));                
                echo(" y son las ".$oFechaActual->format("H").":".$oFechaActual->format("i")." horas en benavente, ");
                $oFechaActual->setTimezone(new DateTimeZone("Europe/Lisbon"));
                echo("las ".$oFechaActual->format("H").":".$oFechaActual->format("i")." en Oporto. <br>");
                $oFechaActual->setTimezone(new DateTimeZone("Europe/Madrid"));
                echo("Naci el ".$oFechaNacimiento->format("j")." de ".$oFechaNacimiento->format("F")." de ".$oFechaNacimiento->format("Y")." y por tanto tengo ".($oFechaActual->diff($oFechaNacimiento))->format("%y")." años,");
                echo("que es lo mismo que ".(date_diff($oFechaNacimiento, $oFechaActual))->format("%a")." dias. <br>");
                echo("El 1 de enero de 2050 tendre ".($oFechaNacimiento->diff(new DateTime("2050-07-19")))->format("%y")." años");                           
            ?>
        </p>
        <footer>
            <p><a href="../../index.html">Alex Asensio Sanchez</a></p>
            <p><a href="../indexProyectoTema3.php">Tema 3</a></p>
            <p><a target="blank" href="https://github.com/AlexAnacardo/204DWESProyectoTema3/tree/developer">GitHub del repositorio</a></p>
        </footer>
    </body>
</html>