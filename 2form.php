<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = ($_POST["nom"]);
        $cant = floatval($_POST["cant"]);
        $prec = floatval($_POST["prec"]);
        function salario($nom, $cant, $prec) {
            $base = 737000;
            $comi = $cant * 50000;
            $valven = $prec * 0.05;
            $tot = $base + $comi + $valven;
            return $tot;
        }
        $tot = salario($nom, $cant, $prec);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="2form.css">
    <title>Ejercicio</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col formulario">
            <form class="tema2" method="post">
                <div class="row">
                    <p><strong>Nombre del vendedor: </strong><input class="input1" type="text" name="nom" required></p>
                </div>
                <div class="row">
                    <p><strong>Cantidad de automoviles vendidos: </strong><input class="input1" type="number" name="cant" step="0.01" required></p>
                </div>
                <div class="row">
                    <p><strong>Precio total automoviles vendidos: </strong><input class="input1" type="number" name="prec" step="0.01" required></p>
                </div>
                <div class='row'>
                    <input class="input1" type='submit' name='Enviar'>
                </div>
                <div class='row'>
                    <?php
                    if (isset($tot)) {
                        echo "<p>Empleado: <strong>$nom</strong>, total a pagar: <strong>$tot</strong></p>";
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>