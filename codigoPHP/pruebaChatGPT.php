<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con Validación PHP</title>
    <style>
        /* Estilos personalizados */
        input[required] {
            background-color: yellow;
        }
        input[disabled] {
            background-color: lightgray;
        }
    </style>
</head>
<body>
    
<!--
    PROMPT USADO:

    Hola, necesito que me escribas en html con codigo php una pagina que recoga 2 campos de un formulario, 
    un campo obligatorio que sera el nombre, y un campo opcional que sera la edad. La pagina tendra la validacion por parte del html desactivada, 
    esta validacion se hara por php. Si los datos se introducen bien, estos se mostraran al darle a enviar, si no, los datos incorrectos se limpiaran

    añadele un campo deshabilitado que contenga la fecha actual, haz que el fondo de los campos obligatorios sea amarillo y el fondo de los campos 
    deshabilitados sea lightgray

-->

<?php
// Inicializamos las variables
$nombre = $edad = "";
$errorNombre = $errorEdad = "";

// Obtenemos la fecha actual
$fechaActual = date("d-m-Y");

// Validación del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validación del campo "nombre" (obligatorio)
    if (empty($_POST["nombre"])) {
        $errorNombre = "El nombre es obligatorio.";
    } else {
        $nombre = limpiar_datos($_POST["nombre"]);
        // Validamos que el nombre solo contenga letras y espacios
        if (!preg_match("/^[a-zA-Z\s]+$/", $nombre)) {
            $errorNombre = "El nombre solo puede contener letras y espacios.";
            $nombre = ""; // Limpiar el campo en caso de error
        }
    }

    // Validación del campo "edad" (opcional)
    if (!empty($_POST["edad"])) {
        $edad = limpiar_datos($_POST["edad"]);
        // Validamos que la edad sea un número entero positivo
        if (!filter_var($edad, FILTER_VALIDATE_INT, array("options" => array("min_range" => 1)))) {
            $errorEdad = "La edad debe ser un número entero positivo.";
            $edad = ""; // Limpiar el campo en caso de error
        }
    }
}

// Función para limpiar los datos de entrada
function limpiar_datos($data) {
    $data = trim($data);  // Eliminar espacios en blanco
    $data = stripslashes($data);  // Eliminar barras invertidas
    $data = htmlspecialchars($data);  // Convertir caracteres especiales en entidades HTML
    return $data;
}
?>

<h2>Formulario de Registro</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Nombre: <input type="text" name="nombre" value="<?php echo $nombre; ?>" required><br>
    <span style="color: red;"><?php echo $errorNombre; ?></span><br>
    
    Edad (opcional): <input type="text" name="edad" value="<?php echo $edad; ?>"><br>
    <span style="color: red;"><?php echo $errorEdad; ?></span><br><br>
    
    <!-- Campo deshabilitado que muestra la fecha actual -->
    Fecha Actual: <input type="text" name="fecha" value="<?php echo $fechaActual; ?>" disabled><br><br>
    
    <input type="submit" value="Enviar">
</form>

<?php
// Si no hay errores, mostramos los datos ingresados
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errorNombre) && empty($errorEdad)) {
    echo "<h3>Datos introducidos correctamente:</h3>";
    echo "Nombre: " . $nombre . "<br>";
    if (!empty($edad)) {
        echo "Edad: " . $edad . "<br>";
    } else {
        echo "Edad: No proporcionada<br>";
    }
    echo "Fecha Actual: " . $fechaActual . "<br>";
}
?>

</body>
</html>