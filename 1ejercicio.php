<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $parcial1 = isset($_POST['parcial1']) ? floatval($_POST['parcial1']) : 0;
            $parcial2 = isset($_POST['parcial2']) ? floatval($_POST['parcial2']) : 0;
            $parcial3 = isset($_POST['parcial3']) ? floatval($_POST['parcial3']) : 0;
            $examenfinal = isset($_POST['examenfinal']) ? floatval($_POST['examenfinal']) : 0;
            $trabajofinal = isset($_POST['trabajofinal']) ? floatval($_POST['trabajofinal']) : 0;

            $promedio_parciales = ($parcial1 + $parcial2 + $parcial3) / 3;

            $nota_final = ($promedio_parciales * 0.35) + ($examenfinal * 0.35) + ($trabajofinal * 0.30);

            $resultado = $nota_final >= 3 ? "Aprobó" : "No aprobó";

            echo "<h1>Resultado</h1>";
            echo "<p>Nota Final: " . number_format($nota_final, 2) . "</p>";
            echo "<p>Estado: " . $resultado . "</p>";
        } else {
            echo "<p>Error: No se recibieron datos del formulario.</p>";
        }
    ?>
</body>
</html>