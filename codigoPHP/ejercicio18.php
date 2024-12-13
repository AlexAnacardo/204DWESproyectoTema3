<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 17</title>
    </head>
    <body>
        <header>
            <h1>Array bidimensional</h1>
            <link rel="stylesheet" href="../webroot/css/ejercicio01.css">
        </header>
        <p>
            <?php
            /*
            * @version 2024/10/7
            * @author Alex Asensio Sanchez                          
            */
                $aAsientos=[
                    $aFila1=["Pepe1", "Paco1", "Manolita1", "Pepita1","Martin1"],
                    $aFila2=["Pepe2", "Paco2", "Manolita2", "Pepita2","Martin2"],
                    $aFila3=["Pepe3", "Paco3", "Manolita3", "Pepita3","Martin3"],
                    $aFila4=["Pepe4", "Paco4", "Manolita4", "Pepita4","Martin4"],
                    $aFila5=["Pepe5", "Paco5", "Manolita5", "Pepita5","Martin5"],
                    $aFila6=["Pepe6", "Paco6", "Manolita6", "Pepita6","Martin6"],
                    $aFila7=["Pepe7", "Paco7", "Manolita7", "Pepita7","Martin7"],
                    $aFila8=["Pepe8", "Paco8", "Manolita8", "Pepita8","Martin8"],
                    $aFila9=["Pepe9", "Paco9", "Manolita9", "Pepita9","Martin9"],
                    $aFila10=["Pepe10", "Paco10", "Manolita10", "Pepita10","Martin10"],
                    $aFila11=["Pepe11", "Paco11", "Manolita11", "Pepita11","Martin11"],
                    $aFila12=["Pepe12", "Paco12", "Manolita12", "Pepita12","Martin12"],
                    $aFila13=["Pepe13", "Paco13", "Manolita13", "Pepita13","Martin13"],
                    $aFila14=["Pepe14", "Paco14", "Manolita14", "Pepita14","Martin14"],
                    $aFila15=["Pepe15", "Paco15", "Manolita15", "Pepita15","Martin15"],
                    $aFila16=["Pepe16", "Paco16", "Manolita16", "Pepita16","Martin16"],
                    $aFila17=["Pepe17", "Paco17", "Manolita17", "Pepita17","Martin17"],
                    $aFila18=["Pepe18", "Paco18", "Manolita18", "Pepita18","Martin18"],
                    $aFila19=["Pepe19", "Paco19", "Manolita19", "Pepita19","Martin19"],
                    $aFila20=["Pepe20", "Paco20", "Manolita20", "Pepita20","Martin20"],
                ];
                        
                echo("<h3>Usando función foreach</h3>");
                foreach($aAsientos as $fila){
                    foreach($fila as $asiento){
                        echo("$asiento, ");
                    }
                    echo("<br>");
                }
                echo("<h3>Usando while</h3>");
                $iPunteroFilas=0;
                $iPunteroAsientos=0;                
                while($iPunteroFilas<count($aAsientos)){                    
                    while($iPunteroAsientos<count($aAsientos[$iPunteroFilas])){                        
                        echo($aAsientos[$iPunteroFilas][$iPunteroAsientos].", ");
                        $iPunteroAsientos++;
                    }
                    echo("<br>");
                    $iPunteroFilas++;
                    $iPunteroAsientos=0;
                }
                echo("<h3>Usando for</h3>");                 
                for($i=0; $i<count($aAsientos); $i++){
                    for($j=0; $j<count($aAsientos[$i]); $j++){
                        echo($aAsientos[$i][$j].", ");
                    }
                    echo("<br>");
                }
            ?>
        </p>
        <footer>
            <p><a href="../../index.html">Alex Asensio Sanchez</a></p>
            <p><a href="../indexProyectoTema3.php">Tema 3</a></p>
            <p><a target="blank" href="https://github.com/AlexAnacardo/204DWESProyectoTema3/tree/developer">GitHub del repositorio</a></p>
        </footer>
    </body>
</html>
