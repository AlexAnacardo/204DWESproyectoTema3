<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 00</title>
    </head>
    <body>
        <header>
            <h1>Inicializar y mostrar una variable heredoc</h1>
        </header>
        <p>
            <?php
            /*
             * @version 2024/10/1
             * @author Alex Asensio Sanchez                          
             */
                $cadena = <<< micadena
                        Esto es una variable de tipo heredoc
                        micadena;
                
                echo $cadena;
            ?>
        </p>
        <footer>
            <p><a href="../../index.html">Alex Asensio Sanchez</a></p>
            <p><a href="../indexProyectoTema3.php">Tema 3</a></p>
            <p><a target="blank" href="https://github.com/AlexAnacardo/204DWESProyectoTema3/tree/developer">GitHub del repositorio</a></p>
        </footer>
    </body>
</html>


