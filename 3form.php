<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = ($_POST["nom"]);
        $peskg = intval($_POST["peskg"]);
        $estmet = floatval($_POST["estmet"]);
        function inmaco($nom, $peskg, $estmet) {
            $cuadrado = pow($estmet, 2);
            $imc = $peskg / $cuadrado;
            return $imc;
        }
        $imc = inmaco($nom, $peskg, $estmet);
        if ($imc > 40) {
            $resultado = "Obesidad morbida";
        } 
        elseif ($imc >= 30.0 && $imc <= 39.9) {
            $resultado = "Obeso";
        }
        elseif ($imc >= 25.0 && $imc <= 29.9) {
            $resultado = "Con sobrepeso";
        }
        elseif ($imc >= 18.5 && $imc <= 24.9) {
            $resultado = "Saludable - peso ideal";
        }
        else {
            $resultado = "Por debajo del peso ideal";
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="3form.css">
    <title>Ejercicio</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col formulario">
            <form class="tema3" method="post">
                <div class="row">
                    <p><strong>Nombre del paciente: </strong><input class="input1" type="text" name="nom" required></p>
                </div>
                <div class="row">
                    <p><strong>Peso en kg: </strong><input class="input1" type="number" name="peskg" required></p>
                </div>
                <div class="row">
                    <p><strong>Estatura en metros: </strong><input class="input1" type="number" name="estmet" step="0.01" required></p>
                </div>
                <div class='row'>
                    <input class="input1" type='submit' name='Enviar'>
                </div>
                <div class='row'>
                    <?php
                    if (isset($imc)) {
                        echo "<p>Paciente: <strong> $nom </strong></p>";
                        echo "<p>Estado: <strong> $resultado </strong></p>";
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>