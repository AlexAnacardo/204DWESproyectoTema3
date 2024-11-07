<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 17</title>
        <style>
            .ocupado{
                background-color: green;
            }
            .vacio{
                background-color: gray;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Array bidimensional</h1>
        </header>
        <p>
            <?php
            /*
            * @version 2024/10/8
            * @author Alex Asensio Sanchez                          
            */
                $aAsientos=[
                    $aFila1=array_fill(0,15, null),
                    $aFila2=array_fill(0,15, null),
                    $aFila3=array_fill(0,15, null),
                    $aFila4=array_fill(0,15, null),
                    $aFila5=array_fill(0,15, null),
                    $aFila6=array_fill(0,15, null),
                    $aFila7=array_fill(0,15, null),
                    $aFila8=array_fill(0,15, null),
                    $aFila9=array_fill(0,15, null),
                    $aFila10=array_fill(0,15, null),
                    $aFila11=array_fill(0,15, null),
                    $aFila12=array_fill(0,15, null),
                    $aFila13=array_fill(0,15, null),
                    $aFila14=array_fill(0,15, null),
                    $aFila15=array_fill(0,15, null),
                    $aFila16=array_fill(0,15, null),
                    $aFila17=array_fill(0,15, null),
                    $aFila18=array_fill(0,15, null),
                    $aFila19=array_fill(0,15, null),
                    $aFila20=array_fill(0,15, null),
                ];
                
                $aAsientos[6][6]="Alex";
                $aAsientos[16][9]="Victor";
                $aAsientos[2][4]="Luis";
                $aAsientos[10][14]="Jesus";
                ?>
                <table>
                    <?php
                    echo("<h3>Usando foreach</h3>");
                    foreach($aAsientos as $fila){
                        echo("<tr>");
                        foreach($fila as $asiento){
                            if(is_null($asiento)){
                                echo('<td class="vacio">Vacio</td>');
                            }
                            else{
                                echo('<td class="ocupado">'.$asiento.'</td>');
                            }
                            
                        }
                        echo("</tr><br>");
                    }
                    ?>
                </table>
                <table>
                    <?php
                    echo("<h3>Usando while</h3>");
                        $iPunteroFilas=0;
                        $iPunteroAsientos=0;                
                        while($iPunteroFilas<count($aAsientos)){                    
                            while($iPunteroAsientos<count($aAsientos[$iPunteroFilas])){                        
                                if(is_null($asiento)){
                                echo('<td class="vacio">Vacio</td>');
                            }
                            else{
                                echo('<td class="ocupado">'.$asiento.'</td>');
                            }
                                $iPunteroAsientos++;
                            }
                            echo("<br>");
                            $iPunteroFilas++;
                            $iPunteroAsientos=0;
                        }
                    ?>
                </table>
                <table>
                    <?php
                        echo("<h3>Usando for</h3>");                 
                        for($i=0; $i<count($aAsientos); $i++){
                            for($j=0; $j<count($aAsientos[$i]); $j++){
                                echo($aAsientos[$i][$j].", ");
                            }
                            echo("<br>");
                        }
                    ?>
                </table>                           
        </p>
        <footer>
            <p><a href="../../index.html">Alex Asensio Sanchez</a></p>
            <p><a href="../indexProyectoTema3.php">Tema 3</a></p>
            <p><a target="blank" href="https://github.com/AlexAnacardo/204DWESProyectoTema3/tree/developer">GitHub del repositorio</a></p>
        </footer>
    </body>
</html>