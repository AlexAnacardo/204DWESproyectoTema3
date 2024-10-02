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

                $oFechaActual = new DateTime();
                    setlocale(LC_TIME, 'es_ES');                   
                    
                    echo(strftime("Hoy es %d de %b del %Y y son las %k:%m"));                    
            ?>
        </p>
        <footer>
            <p><a href="../indexProyectoTema3.php">Alex Asensio Sanchez</a></p>
        </footer>
    </body>
</html>