<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="1form.css">
</head>

    <div class="todo">
        <h2>Formulario</h2>
        <form method="post" action="1ejercicio.php">
            <div class="input-group">
                <label for="parcial1">Parcial 1:</label>
                <input type="text" id="parcial1" name="parcial1" required>
            </div>

            <div class="input-group">
                <label for="parcial2">Parcial 2:</label>
                <input type="text" id="parcial2" name="parcial2" required>
            </div>

            <div class="input-group">
                <label for="parcial3">Parcial 3:</label>
                <input type="text" id="parcial3" name="parcial3" required>
            </div>

            <div class="input-group">
                <label for="examen">Examen final:</label>
                <input type="text" id="examen" name="examen" required>
            </div>

            <div class="input-group">
                <label for="trabajo">Trabajo final:</label>
                <input type="text" id="trabajo" name="trabajo" required>
            </div>
           <div class="submit-container">
                <input type="submit" value="Enviar">
            </div>

            
        </form>
        <br>
    </div>

</body>
</html>