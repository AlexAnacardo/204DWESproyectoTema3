<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 24</title>
        <link rel="stylesheet" href="../webroot/css/ejercicio24.css">
    </head>
    <body>
        <header>
            <h1>Formulario validado 2</h1>
        </header>
            <?php
                /**
                 * @author Alex Asensio Sanchez
                 * @version Fecha de última modificación 16/10/2024
                 */
                 
                //importamos la libreria de vaidaciones
                require_once('../core/231018libreriaValidacion.php');
                 
                $aErrores=[  //Array de errores
                    'nombre'=>" ",
                    'edad'=>" ",
                    'fechaNac'=>" ",
                    'email'=>" ",
                    'real'=>" ",
                ]; 
                $aRespuestas=[  //Array de respuestas
                    'nombre'=>" ",
                    'edad'=>" ",
                    'fechaNac'=>" ",
                    'email'=>" ",
                    'real'=>0.0,
                ]; 
                $entradaOK=true; //Booleano que confirma que todo va bien
                
                //Cuando se envien los datos, se entrara aqui para validarlos
                if(isset($_REQUEST['enviar'])){
                        
                        $aErrores=[ 
                            'nombre' => validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'], 1000, 1, 1),
                            'edad' => validacionFormularios::comprobarEntero($_REQUEST['edad']),
                            'fechaNac'=> validacionFormularios::validarFecha($_REQUEST['fechaNac'], '01/01/2200'),
                            'email'=> validacionFormularios::validarEmail($_REQUEST['email']),
                            'real'=> validacionFormularios::comprobarFloat($_REQUEST['real']),
                        ];   
                    
                    //Se recorre el array, si hay errores el booleano entradaOK sera false y el formulario no se enviara
                    foreach ($aErrores as $clave => $valor) {
                        if ($valor == !null) {
                            $entradaOK = false;
                        }
                    }
                }
                else{
                    $entradaOK=false;
                }
                //Se entrara aqui si los datos han sido introducidos y validados
                if($entradaOK){
                    $aRespuestas['nombre']=$_REQUEST['nombre'];
                    $aRespuestas['edad']=$_REQUEST['edad'];
                    $aRespuestas['fechaNac']=$_REQUEST['fechaNac'];
                    $aRespuestas['email']=$_REQUEST['email'];
                    $aRespuestas['real']=$_REQUEST['real'];
                    
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
                }
                else{
                ?>
                        
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
                        <div id="divNombre">
                            <label for="nombre">Nombre:</label><br>
                            <input type="text" id="nombre" name="nombre" style="background-color: yellow" value="<?php echo (!$aErrores['nombre'] == "" ? '' : $_REQUEST['nombre']); ?>"/><!-- Si el array de errores esta vacio y la variable "nombre" tiene un valor ya validado, este aparecera en el campo de haber un error en otro de los campos -->
                            <?php if (!empty($aErrores["nombre"])) { ?>
                                    <!--Si hay algun error almacenado en el array, el mensaje del mismo se mostrara, esto para cada caso-->
                                    <p style="color: red"><?php echo $aErrores["nombre"]; ?></p>
                            <?php } ?>
                        </div>
                        <div id="divEdad">
                            <label for="edad">Edad:</label><br>
                            <input type="text" id="edad" name="edad" value="<?php echo (!$aErrores['edad'] == "" ? '' : $_REQUEST['edad']); ?>"/><!-- Si el array de errores esta vacio y la variable "nombre" tiene un valor ya validado, este aparecera en el campo de haber un error en otro de los campos -->

                            <?php if (!empty($aErrores["edad"])) { ?>
                                    <p id="errorFecha" style="color:red"><?php echo $aErrores["edad"]; ?></p>
                            <?php } ?>
                        </div>
                        <div id="divFechaNacimiento">
                            <label for="fechaNac">Fecha de nacimiento:</label><br>
                            <input type="date" id="fechaNac" name="fechaNac" value="<?php echo (!$aErrores['fechaNac'] == "" ? '' : $_REQUEST['fechaNac']); ?>"/><!-- Si el array de errores esta vacio y la variable "nombre" tiene un valor ya validado, este aparecera en el campo de haber un error en otro de los campos -->

                            <?php if (!empty($aErrores['fechaNac'])) { ?>
                                    <p id="errorFecha" style="color:red"><?php echo $aErrores['fechaNac']; ?></p>
                            <?php } ?>
                        </div>
                        <div id="divEmail">
                            <label for="email">Email personal:</label><br>
                            <input type="mail" id="email" name="email" value="<?php echo (!$aErrores['email'] == "" ? '' : $_REQUEST['email']); ?>"/><!-- Si el array de errores esta vacio y la variable "nombre" tiene un valor ya validado, este aparecera en el campo de haber un error en otro de los campos -->

                            <?php if (!empty($aErrores['email'])) { ?>
                                    <p id="errorEmail" style="color:red"><?php echo $aErrores['email']; ?></p>
                            <?php } ?>
                        </div>
                        <div id="divReal">
                            <label for="real">Mete un float:</label><br>
                            <input type="text" id="real" name="real" value="<?php echo (!$aErrores['real'] == "" ? '' : $_REQUEST['real']); ?>"/><!-- Si el array de errores esta vacio y la variable "nombre" tiene un valor ya validado, este aparecera en el campo de haber un error en otro de los campos -->

                            <?php if (!empty($aErrores['real'])) { ?>
                                    <p id="errorReal" style="color:red"><?php echo $aErrores['real']; ?></p>
                            <?php } ?>
                        </div>
                        <div id="enviar">
                            <input id="boton" name="enviar" type="submit" value="Enviar">
                        </div>
                </form>     
                    <?php
                }
            ?>

        <footer>
            <p><a href="../../index.html">Alex Asensio Sanchez</a></p>
            <p><a href="../indexProyectoTema3.php">Tema 3</a></p>
            <p><a target="blank" href="https://github.com/AlexAnacardo/204DWESProyectoTema3/tree/developer">GitHub del repositorio</a></p>
        </footer>
    </body>
</html>


