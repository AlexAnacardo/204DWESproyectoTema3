<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 27</title>
        <link rel="stylesheet" href="../webroot/css/ejercicio27.css">
    </head>
    <body>
        <header>
            <h1>Ejercicio extra</h1>
        </header>
            <?php
                /**
                 * @author Alex Asensio Sanchez
                 * @version Fecha de última modificación 23/10/2024
                 */
                 
                //importamos la libreria de vaidaciones
                require_once('../core/231018libreriaValidacion.php');
                $entradaOK=true; //Booleano que confirma que todo va bien               
                
                $aErrores=[  //Array de errores
                    'nombre' => '',                    
                    'fechaNac'=>'',
                    'sientoHoy'=>'',
                    'curso'=>'',
                    'navidad'=>'',
                    'animo'=>'',
                ]; 
                $aRespuestas=[  //Array de respuestas
                    'nombre'=>" ",                    
                    'fechaNac'=>" ",
                    'curso'=>" ",
                ]; 
                 
                //Cuando se envien los datos, se entrara aqui para validarlos
                if(isset($_REQUEST['enviar'])){
                        
                        $aErrores=[ 
                            'nombre' => validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'], 1000, 1, 1),
                            'curso' => validacionFormularios::comprobarEntero($_REQUEST['curso']),
                            'fechaNac'=> validacionFormularios::validarFecha($_REQUEST['fechaNac'], '01/01/2200'),                                                  
                        ];   
                    
                     //Recorremos el array de errores 
                    foreach ($aErrores as $clave => $valor) {
                        if ($valor == !null) {
                            $entradaOK = false;
                            //Limpiamos el campo si hay un error
                            $_REQUEST[$clave] = ''; 
                        }
                    }
                }
                else{
                    $entradaOK=false;
                }
                //Se entrara aqui si los datos han sido introducidos y validados
                if($entradaOK){
                    $aRespuestas['nombre']=$_REQUEST['nombre'];
                    $aRespuestas['curso']=$_REQUEST['curso'];
                    $aRespuestas['fechaNac']=new DateTime($_REQUEST['fechaNac']);                                    
                    
                ?>
                    <div id="respuesta">                        
                <?php
                        echo "<h1>Respuestas:</h1>";
                        foreach ($aRespuestas as $key => $value) {
                            //echo "$key : $value <br>";
                            echo ($value instanceof DateTime) ? "$key : " . $value->format('d/m/Y') . "<br>" : "$key : $value <br>";  
                        }
                ?>
                    </div>
                <?php
                }
                else{
                ?>
                
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
                        <div id="divNombre">
                            <label for="nombre">Nombre y apellidos del alumno:</label><br>
                            <input type="text" id="nombre" name="nombre" placeholder="Ej: Alex Asensio Sanchez" style="background-color: yellow" value="<?php echo (isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : ''); ?>"/><!-- Si el array de errores esta vacio y la variable "nombre" tiene un valor ya validado, este aparecera en el campo de haber un error en otro de los campos -->
                            <?php if (!empty($aErrores["nombre"])) { ?>
                                    <!--Si hay algun error almacenado en el array, el mensaje del mismo se mostrara, esto para cada caso-->
                                    <p style="color: red"><?php echo $aErrores["nombre"]; ?></p>
                            <?php } ?>
                        </div>
                        <div id="divFechaNac">
                            <label for="fechaNac">Fecha de nacimiento:</label><br>
                            <input type="date" id="fechaNac" name="fechaNac" value="<?php echo (isset($_REQUEST['fechaNac']) ? $_REQUEST['fechaNac'] : ''); ?>"/><!-- Si el array de errores esta vacio y la variable "nombre" tiene un valor ya validado, este aparecera en el campo de haber un error en otro de los campos -->

                            <?php if (!empty($aErrores['fechaNac'])) { ?>
                                    <p id="errorFecha" style="color:red"><?php echo $aErrores['fechaNac']; ?></p>
                            <?php } ?>
                        </div>
                    
                    <div id="divSientoHoy">
                        <p>¿Cómo te sientes hoy?</p>
                        <div id="radios">
                            <input type="radio" id="muyMal" name="sientoHoy" value="Muy mal">
                            <label for="muyMal">Muy mal</label>
                            <input type="radio" id="mal" name="sientoHoy" value="Mal">
                            <label for="mal">Mal</label>
                            <input type="radio" id="regular" name="sientoHoy" value="Regular">
                            <label for="regular">Regular</label>
                            <input type="radio" id="bien" name="sientoHoy" value="Bien">
                            <label for="bien">Bien</label>
                            <input type="radio" id="muyBien" name="sientoHoy" value="Muy bien">
                            <label for="muyBien">Muy bien</label>
                        </div>
                    </div>
                        
                        <div id="divCurso">
                            <label for="curso">¿Cómo va el curso? [0-10]:</label><br>
                            <input type="text" id="curso" name="curso" placeholder="Ej: 1" value="<?php echo (isset($_REQUEST['curso']) ? $_REQUEST['curso'] : ''); ?>"/><!-- Si el array de errores esta vacio y la variable "nombre" tiene un valor ya validado, este aparecera en el campo de haber un error en otro de los campos -->

                            <?php if (!empty($aErrores["curso"])) { ?>
                                    <p id="errorCurso" style="color:red"><?php echo $aErrores["curso"]; ?></p>
                            <?php } ?>
                        </div>
                        
                        <div id="divNavidad">
                            <label for="navidad">¿Cómo se presentan las vacaciones de navidad?</label>
                            <select id="navidad" name="navidad">
                                <option value="Ni idea">Ni idea</option>
                                <option value="Con la familia">Con la familia</option>
                                <option value="De fiesta">De fiesta</option>
                                <option value="Trabajando">Trabajando</option>
                                <option value="Estudiando">Estudiando</option>
                            </select>
                        </div>
                        
                        <div id="divEstadoAnimo">
                            <label for="animo">Describe brevemente tu estado de animo</label>
                            <textarea id="animo" name="animo"></textarea>
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


