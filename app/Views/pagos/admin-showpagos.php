<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>hello, here your pays!!!</h3>
    <?php
        foreach ($transacciones as $filas) {
            echo "ID: ". $filas["id"] . " Monto: ". $filas["monto"] . " Metodo: ". $filas["metodo_transaccion"] . "<br>";
        }
    ?>
    <br>
    <a href="/">volver</a>
</body>
</html>