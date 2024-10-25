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
                    'nombre'=>'',                    
                    'fechaNac'=>'',
                    'sientoHoy'=>'',
                    'curso'=>'',
                    'navidad'=>'',
                    'animo'=>'',
                ]; 
                 
                $aOpcionesLista=['Ni idea','Con la familia','De fiesta','Trabajando','Estudiando'];
                $aOpcionesRadio=['Muy mal','Mal','Regular','Bien','Muy bien'];
                
                $oFechaHoraActual= new DateTime("now");
                $scadenaFecha=$oFechaHoraActual->format('m/d/Y'); //Declaramos la fecha actual, esto se usara varias veces en la pagina
                //Cuando se envien los datos, se entrara aqui para validarlos
                if(isset($_REQUEST['enviar'])){
                        
                        $aErrores=[ 
                            'nombre' => validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'], 1000, 1, 1),                                                       
                            'fechaNac'=> validacionFormularios::validarFecha($_REQUEST['fechaNac'], $scadenaFecha, '01/01/1900', 1),                            
                            'sientoHoy'=> !isset($_REQUEST['sientoHoy']) ? "Debe elegir una opcion" : validacionFormularios::validarElementoEnLista($_REQUEST['sientoHoy'], $aOpcionesRadio), //IMPORTANTE, el formato de fecha para el validador es MES/DIA/AÑO
                            'curso' => validacionFormularios::comprobarEntero($_REQUEST['curso'], 10, 0, 1),
                            'navidad'=> validacionFormularios::validarElementoEnLista($_REQUEST['navidad'], $aOpcionesLista),
                            'animo'=> validacionFormularios::comprobarAlfaNumerico($_REQUEST['animo'], 1000, 1, 1)
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
                    $sNombre=$_REQUEST['nombre'];                    
                    $oFechaNac=new DateTime($_REQUEST['fechaNac']); 
                    $sSientoHoy=$_REQUEST['sientoHoy'];
                    $sCurso=$_REQUEST['curso'];
                    $sNavidad=$_REQUEST['navidad'];
                    $sAnimo=$_REQUEST['animo'];                                       
                    $sFecha=$oFechaHoraActual->format("d/m/Y");
                    $sHora=$oFechaHoraActual->format("H:i");
                    $iEdad= $oFechaNac->diff($oFechaHoraActual);
                    $iEdad= $iEdad->format('%y');
                    
                ?>
                    <div id="respuesta">                        
                <?php
                    echo("<p>
                        Hoy $sFecha a las $sHora.
                        D. $sNombre nacido hace $iEdad años se siente $sSientoHoy.
                        Valora su curso actual con $sCurso sobre 10.
                        Estas navidades las dedicará a $sNavidad.
                        Y, además, opina que:
                        $sAnimo
                        </p>")
                        
                ?>
                    </div>
                <?php
                }
                else{
                ?>
                
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
                        <div id="divNombre">
                            <label for="nombre">Nombre y apellidos del alumno:</label>
                            <input type="text" id="nombre" name="nombre" placeholder="Ej: Alex Asensio Sanchez" style="background-color: yellow" value="<?php echo (isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : ''); ?>"/><!-- Si el array de errores esta vacio y la variable "nombre" tiene un valor ya validado, este aparecera en el campo de haber un error en otro de los campos -->
                            <?php if (!empty($aErrores["nombre"])) { ?>
                                    <!--Si hay algun error almacenado en el array, el mensaje del mismo se mostrara, esto para cada caso-->
                                    <p style="color: red"><?php echo $aErrores["nombre"]; ?></p>
                            <?php } ?>
                        </div>
                        <div id="divFechaNac">
                            <label for="fechaNac">Fecha de nacimiento:</label>
                            <input type="date" id="fechaNac" name="fechaNac" value="<?php echo (isset($_REQUEST['fechaNac']) ? $_REQUEST['fechaNac'] : ''); ?>"/><!-- Si el array de errores esta vacio y la variable "nombre" tiene un valor ya validado, este aparecera en el campo de haber un error en otro de los campos -->

                            <?php if (!empty($aErrores['fechaNac'])) { ?>
                                    <p id="errorFecha" style="color:red"><?php echo $aErrores['fechaNac']; ?></p>
                            <?php } ?>
                        </div>
                    
                    <div id="divSientoHoy">
                        <div id="cabeceraSientoHoy">
                            <p>¿Cómo te sientes hoy?</p>
                        </div>
                        <div id="contenedorSientoHoy">
                            <div id="radios">
                                <input type="radio" id="muyMal" name="sientoHoy" value="Muy mal">
                                <label for="muyMal">Muy mal</label>
                                <input type="radio" id="mal" name="sientoHoy" value="Mal">
                                <label for="mal">Mal</label>
                                <input type="radio" id="regular" name="sientoHoy" value="Regular" >
                                <label for="regular">Regular</label>
                                <input type="radio" id="bien" name="sientoHoy" value="Bien">
                                <label for="bien">Bien</label>
                                <input type="radio" id="muyBien" name="sientoHoy" value="Muy bien">
                                <label for="muyBien">Muy bien</label>
                            </div>
                            
                        </div>
                        <div id="errorSientoHoy">
                                <?php if (!empty($aErrores["sientoHoy"])) { ?>
                                            <p><?php echo $aErrores["sientoHoy"]; ?></p>
                                <?php } ?>
                            </div>
                    </div>
                        
                        <div id="divCurso">
                            <label for="curso">¿Cómo va el curso? [0-10]:</label>
                            <input type="text" id="curso" name="curso" placeholder="Ej: 1" value="<?php echo (isset($_REQUEST['curso']) ? $_REQUEST['curso'] : ''); ?>"/><!-- Si el array de errores esta vacio y la variable "nombre" tiene un valor ya validado, este aparecera en el campo de haber un error en otro de los campos -->

                            <?php if (!empty($aErrores["curso"])) { ?>
                                    <p id="errorCurso" style="color:red"><?php echo $aErrores["curso"]; ?></p>
                            <?php } ?>
                        </div>
                        
                        <div id="divNavidad">
                            <label for="navidad">¿Cómo se presentan las vacaciones de navidad?</label>
                            <select id="navidad" name="navidad">
                                <?php
                                    foreach($aOpcionesLista as $valor){
                                        ?>
                                <option value="<?php echo($valor) ?>"><?php echo($valor) ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div id="divEstadoAnimo">
                            <label for="animo">Describe brevemente tu estado de animo</label>
                            <textarea id="animo" name="animo">
                                <?php echo (isset($_REQUEST['animo']) ? $_REQUEST['animo'] : ''); ?>
                            </textarea>
                            <?php if (!empty($aErrores["animo"])) { ?>
                                    <p id="errorAnimo" style="color:red"><?php echo $aErrores["animo"]; ?></p>
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


