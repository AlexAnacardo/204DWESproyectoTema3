<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Plantilla Formulario</title>
        
    </head>
    <body>
        <header>
            <h1>Plantilla formulario</h1>
        </header>
            <?php
                /**
                 * @author Alex Asensio Sanchez
                 * @version Fecha de última modificación 23/10/2024
                 */
                 
                //importamos la libreria de vaidaciones
                require_once('../core/231018libreriaValidacion.php');
                $entradaOK=true; //Booleano que confirma que todo va bien               
                
                //Definimos constantes 
                define('OBLIGATORIO', 1);
                define('OPCIONAL', 0);
                define('FECHA_MAX',date('d-m-Y'));
                define('FECHA_MIN',"01/01/1900");
                define('T_MAX_ALFABETICO',1000);
                define('T_MIN_ALFABETICO',1);
                
                $aErrores=[  //Array de errores
                    'textoObligatorio' => '',
                    'texto'=>'',
                    
                    'enteroObligatorio'=>'',
                    'entero'=>'',
                    
                    'realObligatorio'=>'',
                    'real'=>'',
                    
                    'fechaObligatoria'=>'',
                    'fecha'=>'',
                    
                    'emailObligatorio'=>'',
                    'email'=>'',
                    
                    'telefonoObligatorio'=>'',
                    'telefono'=>'',
                    
                    'urlObligatoria'=>'',
                    'url'=>'',
                                                            
                ]; 
                $aRespuestas=[  //Array de respuestas
                    'textoObligatorio' => '',
                    'texto'=>'',
                    
                    'enteroObligatorio'=>0,
                    'entero'=>0,
                    
                    'realObligatorio'=>0.0,
                    'real'=>0.0,
                    
                    'fechaObligatoria'=>'',
                    'fecha'=>'',
                    
                    'emailObligatorio'=>'',
                    'email'=>'',
                    
                    'telefonoObligatorio'=>'',
                    'telefono'=>'',
                    
                    'urlObligatoria'=>'',
                    'url'=>'',
                ];                  
                
                $oFechaHoraActual= new DateTime("now");
                $sPruebaFecha=$oFechaHoraActual->format('m/d/Y'); //Declaramos la fecha actual, esto se usara varias veces en la pagina
                //Cuando se envien los datos, se entrara aqui para validarlos
                if(isset($_REQUEST['enviar'])){
                        
                        $aErrores=[                                                                                                             
                            'textoObligatorio' => validacionFormularios::comprobarAlfabetico($_REQUEST['textoObligatorio'], T_MAX_ALFABETICO, T_MIN_ALFABETICO, OBLIGATORIO),
                            'texto' => validacionFormularios::comprobarAlfabetico($_REQUEST['textoObligatorio'], T_MAX_ALFABETICO, T_MIN_ALFABETICO, OPCIONAL),
                            
                            'enteroObligatorio' => validacionFormularios::comprobarEntero($_REQUEST['enteroObligatorio'], PHP_INT_MAX, PHP_INT_MIN, OBLIGATORIO),
                            'entero' => validacionFormularios::comprobarEntero($_REQUEST['entero'], PHP_INT_MAX, PHP_INT_MIN, OPCIONAL),
                            
                            'realObligatorio' => validacionFormularios::comprobarFloat($_REQUEST['realObligatorio'], PHP_FLOAT_MAX, PHP_FLOAT_MIN, OBLIGATORIO),
                            'real' => validacionFormularios::comprobarFloat($_REQUEST['real'], PHP_FLOAT_MAX, PHP_FLOAT_MIN, OPCIONAL),
                            
                            'fechaObligatoria' => validacionFormularios::validarFecha($_REQUEST['fechaObligatoria'], FECHA_MAX, FECHA_MIN, OBLIGATORIO),
                            'fecha' => validacionFormularios::validarFecha($_REQUEST['fecha'], FECHA_MAX, FECHA_MIN, OPCIONAL),
                            
                            'emailObligatorio' => validacionFormularios::validarEmail($_REQUEST['emailObligatorio'], OBLIGATORIO),
                            'email' => validacionFormularios::validarEmail($_REQUEST['email'], OPCIONAL),
                            
                            'telefonoObligatorio' => validacionFormularios::validarTelefono($_REQUEST['telefonoObligatorio'], OBLIGATORIO),
                            'telefono' => validacionFormularios::validarTelefono($_REQUEST['telefono'], OPCIONAL),
                            
                            'urlObligatoria' => validacionFormularios::validarURL($_REQUEST['urlObligatoria'], OBLIGATORIO), 
                            'url' => validacionFormularios::validarURL($_REQUEST['url'], OPCIONAL),
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
                    $aRespuestas['textoObligatorio']=$_REQUEST['textoObligatorio'];
                    $aRespuestas['texto']=$_REQUEST['texto'];
                    
                    $aRespuestas['enteroObligatorio']=$_REQUEST['enteroObligatorio'];
                    $aRespuestas['entero']=$_REQUEST['entero'];
                    
                    $aRespuestas['realObligatorio']=$_REQUEST['realObligatorio'];
                    $aRespuestas['real']=$_REQUEST['real'];
                    
                    $aRespuestas['fechaObligatoria']=new DateTime($_REQUEST['fechaObligatoria']);
                    $aRespuestas['fecha']=new DateTime($_REQUEST['fecha']);
                    
                    $aRespuestas['emailObligatorio']=$_REQUEST['emailObligatorio'];
                    $aRespuestas['email']=$_REQUEST['email'];
                    
                    $aRespuestas['telefonoObligatorio']=$_REQUEST['telefonoObligatorio'];
                    $aRespuestas['telefono']=$_REQUEST['telefono'];
                    
                    $aRespuestas['urlObligatoria']=$_REQUEST['urlObligatoria'];
                    $aRespuestas['url']=$_REQUEST['url'];                                                          
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
                    <div>
                        <label for="textoObligatorio">Texto Obligatorio:</label>
                        <input type="text" id="textoObligatorio" name="textoObligatorio" placeholder="Ej: Alex" style="background-color: yellow" value="<?php echo (isset($_REQUEST['textoObligatorio']) ? $_REQUEST['textoObligatorio'] : ''); ?>"/>
                        <?php if (!empty($aErrores["textoObligatorio"])) { ?>
                            <!--Si hay algun error almacenado en el array, el mensaje del mismo se mostrara, esto para cada caso-->
                            <p style="color: red"><?php echo $aErrores["textoObligatorio"]; ?></p>
                        <?php } ?>
                    </div>                    
                    <div>
                        <label for="texto">Texto:</label>
                        <input type="text" id="texto" name="texto" placeholder="Ej: Alex" value="<?php echo (isset($_REQUEST['texto']) ? $_REQUEST['texto'] : ''); ?>"/>
                        <?php if (!empty($aErrores["texto"])) { ?>
                            <!--Si hay algun error almacenado en el array, el mensaje del mismo se mostrara, esto para cada caso-->
                            <p style="color: red"><?php echo $aErrores["texto"]; ?></p>
                        <?php } ?>
                    </div>
                    
                    <div>
                        <label for="enteroObligatorio">Entero Obligatorio:</label>
                        <input type="text" id="enteroObligatorio" name="enteroObligatorio" placeholder="Ej: 1" value="<?php echo (isset($_REQUEST['enteroObligatorio']) ? $_REQUEST['enteroObligatorio'] : ''); ?>"/>
                        <?php if (!empty($aErrores["enteroObligatorio"])) { ?>
                            <p style="color:red"><?php echo $aErrores["enteroObligatorio"]; ?></p>
                        <?php } ?>
                    </div>
                    <div>
                        <label for="entero">Entero:</label>
                        <input type="text" id="entero" name="entero" placeholder="Ej: 1" value="<?php echo (isset($_REQUEST['entero']) ? $_REQUEST['entero'] : ''); ?>"/>
                        <?php if (!empty($aErrores["entero"])) { ?>
                            <p style="color:red"><?php echo $aErrores["entero"]; ?></p>
                        <?php } ?>
                    </div>
                    
                    <div>
                        <label for="realObligatorio">Real Obligatorio:</label><br>
                        <input type="text" id="realObligatorio" name="realObligatorio" placeholder="Ej: 1.2" value="<?php echo (isset($_REQUEST['realObligatorio']) ? $_REQUEST['realObligatorio'] : ''); ?>"/>
                        <?php if (!empty($aErrores['real'])) { ?>
                            <p style="color:red"><?php echo $aErrores['realObligatorio']; ?></p>
                        <?php } ?>
                    </div>
                    <div>
                        <label for="real">Real:</label><br>
                        <input type="text" id="real" name="real" placeholder="Ej: 1.2" value="<?php echo (isset($_REQUEST['real']) ? $_REQUEST['real'] : ''); ?>"/>
                        <?php if (!empty($aErrores['real'])) { ?>
                            <p style="color:red"><?php echo $aErrores['real']; ?></p>
                        <?php } ?>
                    </div>
                    
                    <div>
                        <label for="fechaObligatoria">Fecha Obligatoria:</label><br>
                        <input type="date" id="fechaObligatoria" name="fechaObligatoria" value="<?php echo (isset($_REQUEST['fechaObligatoria']) ? $_REQUEST['fechaObligatoria'] : ''); ?>"/>
                        <?php if (!empty($aErrores['fechaObligatoria'])) { ?>
                            <p style="color:red"><?php echo $aErrores['fechaObligatoria']; ?></p>
                        <?php } ?>
                    </div>
                    <div>
                        <label for="fecha">Fecha:</label><br>
                        <input type="date" id="fecha" name="fecha" value="<?php echo (isset($_REQUEST['fecha']) ? $_REQUEST['fecha'] : ''); ?>"/>
                        <?php if (!empty($aErrores['fecha'])) { ?>
                            <p style="color:red"><?php echo $aErrores['fecha']; ?></p>
                        <?php } ?>
                    </div>
                    
                    <div>
                        <label for="emailObligatorio">Email Obligatorio:</label><br>
                        <input type="mail" id="emailObligatorio" name="emailObligatorio" placeholder="Ej: correo@gmail.es" value="<?php echo (isset($_REQUEST['emailObligatorio']) ? $_REQUEST['emailObligatorio'] : ''); ?>"/>
                        <?php if (!empty($aErrores['emailObligatorio'])) { ?>
                            <p style="color:red"><?php echo $aErrores['emailObligatorio']; ?></p>
                        <?php } ?>
                    </div>
                    <div>
                        <label for="email">Email:</label><br>
                        <input type="mail" id="email" name="email" placeholder="Ej: correo@gmail.es" value="<?php echo (isset($_REQUEST['email']) ? $_REQUEST['email'] : ''); ?>"/>
                        <?php if (!empty($aErrores['email'])) { ?>
                            <p style="color:red"><?php echo $aErrores['email']; ?></p>
                        <?php } ?>
                    </div>
                    
                    <div>
                        <label for="telefonoObligatorio">Telefono Obligatorio:</label><br>
                        <input type="tel" id="telefonoObligatorio" name="telefonoObligatorio" placeholder="000000000" value="<?php echo (isset($_REQUEST['telefonoObligatorio']) ? $_REQUEST['telefonoObligatorio'] : ''); ?>"/>
                        <?php if (!empty($aErrores['telefonoObligatorio'])) { ?>
                            <p style="color:red"><?php echo $aErrores['telefonoObligatorio']; ?></p>
                        <?php } ?>
                    </div>
                    <div>
                        <label for="telefono">Telefono:</label><br>
                        <input type="tel" id="telefono" name="telefono" placeholder="000000000" value="<?php echo (isset($_REQUEST['telefono']) ? $_REQUEST['telefono'] : ''); ?>"/>
                        <?php if (!empty($aErrores['telefono'])) { ?>
                            <p style="color:red"><?php echo $aErrores['telefono']; ?></p>
                        <?php } ?>
                    </div>
                    
                    <div>
                        <label for="urlObligatoria">URL Obligatorio:</label><br>
                        <input type="url" id="urlObligatoria" name="urlObligatoria" placeholder="Ej: http://......" value="<?php echo (isset($_REQUEST['urlObligatoria']) ? $_REQUEST['urlObligatoria'] : ''); ?>"/>
                        <?php if (!empty($aErrores['urlObligatoria'])) { ?>
                            <p style="color:red"><?php echo $aErrores['urlObligatoria']; ?></p>
                        <?php } ?>
                    </div>
                    <div>
                        <label for="url">URL:</label><br>
                        <input type="url" id="url" name="url" placeholder="Ej: http://......" value="<?php echo (isset($_REQUEST['url']) ? $_REQUEST['url'] : ''); ?>"/>
                        <?php if (!empty($aErrores['url'])) { ?>
                            <p style="color:red"><?php echo $aErrores['url']; ?></p>
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
