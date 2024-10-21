<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 22</title>
        <link rel="stylesheet" href="../webroot/css/ejercicio22.css">
    </head>
    <body>
        <header>
            <h1>Formulario Ejcercicio 22</h1>
        </header>        
        <div>
            <?php
            /*
            * @version 2024/10/11
            * @author Alex Asensio Sanchez                          
            */
                if(isset($_REQUEST['enviar'])){
                    //Este codigo se ejecuta cuando se envia el formulario

                    echo("Nombre: ".$_REQUEST['nombre']."<br>");
                    echo("Apellidos: ".$_REQUEST['apellidos']."<br>");

                }
                else{
                    //Este codigo se ejecuta antes de enviar el formulario
            ?>
                    <form name="ejercicio21" action="<?php basename($_SERVER['PHP_SELF'])?>" method="post">
                    <label for="nombre">Nombre: <input type="text" id="nombre" name="nombre" required="yes"/></label>
                    <label for="apellidos">Apellidos: <input type="text" id="apellidos" name="apellidos" required="yes"/></label>           
                    <button type="submit" name="enviar">Enviar</button>
                    </form>
            <?php
                }
            ?>
        </div>
        <footer>
            <p><a href="../../index.html">Alex Asensio Sanchez</a></p>
            <p><a href="../indexProyectoTema3.php">Tema 3</a></p>
            <p><a target="blank" href="https://github.com/AlexAnacardo/204DWESProyectoTema3/tree/developer">GitHub del repositorio</a></p>
        </footer>
    </body>
</html>


