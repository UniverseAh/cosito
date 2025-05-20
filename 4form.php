<?php
function calcularCuotaFija($monto, $tasa, $plazo)
{
    $tasa_decimal = $tasa / 100;
    return $monto * ($tasa_decimal * pow(1 + $tasa_decimal, $plazo)) / (pow(1 + $tasa_decimal, $plazo) - 1);
}

function formatear($num)
{
    return number_format($num, 2, ',', '.');
}

$tabla = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST["cedula"];
    $nombre = $_POST["nombre"];
    $monto = floatval($_POST["monto"]);
    $tasa = floatval($_POST["tasa"]);
    $plazo = intval($_POST["plazo"]);

    $cuota_fija = calcularCuotaFija($monto, $tasa, $plazo);

    $saldo_anterior = $monto;
    $tabla .= "<div style='margin-bottom:10px;'><b>Cédula:</b> $cedula<br><b>Cliente:</b> $nombre</div>";
    $tabla .= "<table class='amortizacion'><tr>
        <th>No. Cuota</th>
        <th>Saldo Anterior</th>
        <th>Valor Cuota Fija</th>
        <th>Abono Interés<br><span style='font-weight:normal;'>(Saldo anterior * tasa de interés / 100)</span></th>
        <th>Abono Capital<br><span style='font-weight:normal;'>(cuota fija - abono interés)</span></th>
        <th>Nuevo Saldo<br><span style='font-weight:normal;'>(saldo anterior - abono capital)</span></th></tr>";
        
    for ($i = 1; $i <= $plazo; $i++) {
        $abono_interes = $saldo_anterior * ($tasa / 100);
        $abono_capital = $cuota_fija - $abono_interes;
        $nuevo_saldo = $saldo_anterior - $abono_capital;
        $tabla .= "<tr>
            <td>$i</td>
            <td>" . formatear($saldo_anterior) . "</td>
            <td>" . formatear($cuota_fija) . "</td>
            <td>" . formatear($abono_interes) . "</td>
            <td>" . formatear($abono_capital) . "</td>
            <td>" . formatear($nuevo_saldo) . "</td>
        </tr>";
        $saldo_anterior = $nuevo_saldo;
    }
    $tabla .= "</table>";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="4form.css">
</head>

<body>
    <div class="container">
        <form method="post" class="formulario">
            <div class="row">
                <label>Cédula del cliente:</label>
                <input type="text" name="cedula" required>
            </div>
            <div class="row">
                <label>Nombre del cliente:</label>
                <input type="text" name="nombre" required>
            </div>
            <div class="row">
                <label>Monto del crédito:</label>
                <input type="number" name="monto" step="0.01" required>
            </div>
            <div class="row">
                <label>Tasa de interés mensual (%):</label>
                <input type="number" name="tasa" step="0.01" required>
            </div>
            <div class="row">
                <label>Plazo en meses:</label>
                <input type="number" name="plazo" required>
            </div>
            <div class="row">
                <input type="submit" value="Calcular">
            </div>
        </form>
        <div class="resultado">
            <?php if ($tabla) echo $tabla; ?>
        </div>
    </div>
</body>

</html>