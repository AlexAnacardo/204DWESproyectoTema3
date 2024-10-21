<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Array de sueldo</h1>
    </header>
    <?php
    /*
     * @version 2024/10/3
     * @author Alex Asensio Sanchez                          
     */
    
        //Esta variable es un array asociativo que contiene el sueldo de una semana asociado a su correspondiente dia
        $aSueldos=[
            'Lunes'=>40.3,
            'Martes'=>40,
            'Miercoles'=>45.75,
            'Jueves'=>30,
            'Viernes'=>40.2,
            'Sabado'=>50.55,
            'Domingo'=>50];                
        
        //El bucle recorre el array elemento por elemento, asignandole la clave a la variable $dia y el sueldo a la variable $valor
        function recorrerArray($array){
            //Esta variable contendra el total del sueldo
            $dTotalSueldo=0;
            foreach($array as $dia=>$valor){
                echo("Sueldo del ".$dia.": ".$valor."€<br>");
                //La variable $dTotalSueldo acumula los sueldos
                $dTotalSueldo+=$valor;
            }
            echo("<br>Sueldo total de la semana ".$dTotalSueldo."€");
        }
        
        recorrerArray($aSueldos);
        
    ?>
    <footer>
        <p><a href="../../index.html">Alex Asensio Sanchez</a></p>
        <p><a href="../indexProyectoTema3.php">Tema 3</a></p>
        <p><a target="blank" href="https://github.com/AlexAnacardo/204DWESProyectoTema3/tree/developer">GitHub del repositorio</a></p>
    </footer>
</body>
</html>