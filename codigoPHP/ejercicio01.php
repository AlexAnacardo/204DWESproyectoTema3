<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 01</title>
    </head>
    <body>
        <p>
            <?php
                $cadena="hola";
                $nombre="alex";
                $entero=1;
                $real=2.4;               
                $booleano=true;
                $array = array("Hola", "mundo");
                echo($cadena);
                echo ('<br>');
                print 'hola '.$nombre;
                echo ('<br>');
                printf("hola %s \n",$nombre);  
                echo ('<br>');
                print_r($array);
                echo ('<br>');
                echo var_dump($entero);
            ?>
        </p>
    </body>
</html>

