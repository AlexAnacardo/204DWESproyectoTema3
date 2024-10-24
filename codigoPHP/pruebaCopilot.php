<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Ejemplo</title>
    <style>
        .required {
            background-color: yellow;
        }
        .disabled {
            background-color: lightgray;
        }
    </style>
</head>
<body>
    <?php
    $name = $age = "";
    $nameErr = $ageErr = "";
    $currentDate = date("Y-m-d");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "El nombre es obligatorio";
        } else {
            $name = test_input($_POST["name"]);
        }

        if (!empty($_POST["age"])) {
            if (!is_numeric($_POST["age"])) {
                $ageErr = "La edad debe ser un número";
                $age = "";
            } else {
                $age = test_input($_POST["age"]);
            }
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>Formulario de Ejemplo</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nombre: <input type="text" name="name" class="required" value="<?php echo $name;?>">
        <span><?php echo $nameErr;?></span>
        <br><br>
        Edad: <input type="text" name="age" value="<?php echo $age;?>">
        <span><?php echo $ageErr;?></span>
        <br><br>
        Fecha Actual: <input type="text" class="disabled" value="<?php echo $currentDate;?>" disabled>
        <br><br>
        <input type="submit" name="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($ageErr)) {
        echo "<h3>Datos recibidos:</h3>";
        echo "Nombre: " . $name . "<br>";
        if (!empty($age)) {
            echo "Edad: " . $age . "<br>";
        }
    }
    ?>
</body>
</html>