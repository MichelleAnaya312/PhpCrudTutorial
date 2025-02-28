<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data["titulo"];
            ?></title>
</head>

<body>
    <h2><?php echo $data["titulo"];
        ?></h2>

    <form id="nuevo" name="nuevo" method="POST" action="index.php?c=vehiculos&a=guarda" autocomplete="off">
        Placa: <input type="text" id="placa" name="placa"><br>
        Marca: <input type="text" id="marca" name="marca"><br>
        Modelo: <input type="text" id="modelo" name="modelo"><br>
        Año: <input type="text" id="anio" name="anio"><br>
        Color: <input type="text" id="color" name="color"><br>

        <button id="guardar" name="guardar" type="submit">Guardar</button>
    </form>
</body>

</html>