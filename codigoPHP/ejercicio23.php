<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 23</title>
        <link rel="stylesheet" href="../webroot/css/ejercicio23.css">
    </head>
    <body>
        <header>
            <h1>Formulario con validacion 1</h1>
        </header>
            <?php
                /**
                 * @author Victor Garcia Gordon
                 * @version Fecha de última modificación 16/10/2024
                 */
                 
                //Incluimos una libreria externa
                require_once('../core/231018libreriaValidacion.php');
                                
                $aErrores=[]; //Array que almacena errores
                $aRespuestas=[]; //Array que almacena las respuestas enviadas
                $entradaOK=true; //Array 
                
                // Verifica si el formulario ha sido enviado
                if (isset($_REQUEST['enviar'])) {
                        //Se hace un llamamiento a las funciones comprobarAlfabetico y comprobarEntero, que validan cadenas y numeros enteros respectivamente
                        //en caso de haber un error en la entrada se añadira al array, en caso de no haber error se añadira un valor nulo
                        $aErrores=[ 
                            'nombre' => validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'], 1000, 1, 1),
                            'edad' => validacionFormularios::comprobarEntero($_REQUEST['edad']),
                        ];                        
                        
                        //Recorremos el array de errores, si hay algun error, el comprobador cambia a false
                        foreach ($aErrores as $clave => $valor) {
                                if ($valor == !null) {
                                        $entradaOK = false;
                                }
                        }
                } else {
                        //Aqui se entra si el formulario no se ha rellenado, por lo tanto, el comprobador se inicializa a false
                        $entradaOK = false;
                }

                //Si entradaOK tiene el valor true porque se  han introducido datos y estos han sido validados, los mismos se mostraran por pantalla asi
                if ($entradaOK) {
                        //Almacenamos el valor de las respuestas en el array
                        $aRespuestas = [
                                'Nombre' => $_REQUEST['nombre'],
                                'Edad' => $_REQUEST['edad'],                            
                        ];

                        //Mostramos las respuestas por pantalla
                        ?>
                        <div id="respuesta">                        
                        <?php
                        echo "<h1>Respuestas:</h1>";
                        foreach ($aRespuestas as $key => $value) {
                                echo "$key : $value <br>";
                        }
                        ?>
                        </div>
                        <?php
                } else {
                        //Mostrara el formulario hasta que lo rellenemos correctamente
                ?>

            <main>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
                        <div id="nombre">
                            <label for="nombre">Nombre:</label><br>
                            <input type="text" id="nombre" name="nombre" style="background-color: yellow"><br>
                            <?php if (!empty($aErrores["nombre"])) { ?>
                                    <!--Si hay algun error almacenado en el array, el mensaje del mismo se mostrara, esto para cada caso-->
                                    <p style="color: red"><?php echo $aErrores["nombre"]; ?></p>
                            <?php } ?>
                        </div>
                        <div id="fechaNac">
                            <label for="edad">Edad:</label>
                            <input type="text" id="edad" name="edad"><br>

                            <?php if (!empty($aErrores["edad"])) { ?>
                                    <p id="errorFecha" style="color:red"><?php echo $aErrores["edad"]; ?></p>
                            <?php } ?>
                        </div>
                        <div id="fechaActual">
                            <label for="fecha">Fecha actual:</label><br>
                            <?php
                                $fechaActual=new DateTime('now', new DateTimeZone("Europe/Madrid"));

                                $fechaActual=$fechaActual->format("Y").'-'.$fechaActual->format("m").'-'.$fechaActual->format("j");                                  
                            ?>
                        
                            <input type="text" id="fecha" name="fecha" disabled value="<?php echo(date("Y-m-d"))?>">
                        </div>
                        <div id="enviar">
                            <input id="boton" name="enviar" type="submit" value="Enviar">
                        </div>
                </form>
                <?php
                }
                ?>
            </main>
        <footer>
            <p><a href="../indexProyectoTema3.php">Alex Asensio Sanchez</a></p>
        </footer>
    </body>
</html>