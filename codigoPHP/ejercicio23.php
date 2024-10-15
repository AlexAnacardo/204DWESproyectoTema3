<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 23</title>
    </head>
    <body>
        <header>
            <h1>Formulario con validacion 1</h1>
        </header>
            <?php
                /**
                 * @author Victor Garcia Gordon
                 * @version Fecha de última modificación 15/10/2024
                 */
                 
                //Incluimos una libreria externa
                require_once('../core/231018libreriaValidacion.php');
                
                //Declaramos los arrays de errores y de datos enviados asi como un comprobador que mientras todo vaya correctamentem tendra valor de true
                $aErrores=[];
                $aRespuestas=[];
                $entradaOK=true;
                
                // Verifica si el formulario ha sido enviado
                if (isset($_REQUEST['enviar'])) {
                        //Se hace un llamamiento a las funciones comprobarAlfabetico y comprobarEntero, que validan cadenas y numeros enteros respectivamente
                        //en caso de haber un error en la entrada se añadira al array, en caso de no haber error se añadira un valor nulo
                        $aErrores=[ 
                            'nombre' => validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'], 1000, 1, 1),
                            'edad' => validacionFormularios::validarFecha($_REQUEST['fecha']),
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

                //Tratamiento del formulario
                if ($entradaOK) {
                        //Almacenamos el valor de las respuestas en el array
                        $aRespuestas = [
                                'nombre' => $_REQUEST['nombre'],
                                'fecha' => $_REQUEST['fecha'],
                        ];

                        //Mostramos las respuestas por pantalla
                        echo "<h1>Respuestas:</h1>";
                        foreach ($aRespuestas as $key => $value) {
                                echo "$key : $value <br>";
                        }
                } else {
                        //Mostrar el formulario hasta que lo rellenemos correctamente
                ?>

            <main>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
                        <label for="nombre">Nombre:</label><br>
                        <input type="text" id="nombre" name="nombre" style="background-color: yellow"><br>
                        <?php if (!empty($aErrores["nombre"])) { ?>
                                <!--Si hay algun error almacenado en el array, el mensaje del mismo se mostrara, esto para cada caso-->
                                <span><?php echo $aErrores["nombre"]; ?></span>
                        <?php } ?>
                        <br><label for="fecha">Fecha Nacimiento:</label><br>
                        <input type="text" id="fecha" name="fecha"><br>
                        
                        <?php if (!empty($aErrores["fecha"])) { ?>
                                <span><?php echo $aErrores["edad"]; ?></span>
                        <?php } ?>
                        <br>
                        <label for="fecha">Fecha actual:</label><br>
                        <?php
                            $fechaActual=new DateTime('now', new DateTimeZone("Europe/Madrid"));
                            
                            $fechaActual=$fechaActual->format("Y").'-'.$fechaActual->format("m").'-'.$fechaActual->format("j");                                  
                        ?>
                        <input type="text" id="fecha" name="fecha" disabled value="<?php echo(date("Y-m-d"))?>"><br>
                        <br>
                        <input name="enviar" type="submit" value="Enviar">
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