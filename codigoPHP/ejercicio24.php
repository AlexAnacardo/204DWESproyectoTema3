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
                    'nombre'=>"",
                    'edad'=>"",
                ]; 
                $aRespuestas=[  //Array de respuestas
                    'nombre'=>"",
                    'edad'=>"",
                ]; 
                $entradaOK=true; //Booleano que confirma que todo va bien
                
                //Cuando se envien los datos, se entrara aqui para validarlos
                if(isset($_REQUEST['enviar'])){
                        
                        $aErrores=[ 
                            'nombre' => validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'], 1000, 1, 1),
                            'edad' => validacionFormularios::comprobarEntero($_REQUEST['edad']),
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
                        <div id="datos">
                            <label for="nombre">
                                <p>Nombre:</p> <input type="text" id="nombre" name="nombre" style="background-color: yellow "/>
                            </label>
                            <?php if (!empty($aErrores["nombre"])) { ?>
                                <!--Si hay algun error almacenado en el array, el mensaje del mismo se mostrara, esto para cada caso-->
                                <p style="color: red"><?php echo $aErrores["nombre"]; ?></p>
                            <?php } ?>
                            <label for="edad">
                                Edad: <input type="text" id="edad" name="edad"/>
                            </label>
                            <?php if (!empty($aErrores['edad'])){ ?>
                                <p style="color: red"><?php echo($aErrores['edad'])?></p>
                            <?php } ?>
                        </div>
                        <input type="submit" id="enviar" name="enviar" value="Enviar"/>                        
                    </form>       
                    <?php
                }
            ?>
        <footer>
            <p><a href="../indexProyectoTema3.php">Alex Asensio Sanchez</a></p>
        </footer>
    </body>
</html>


