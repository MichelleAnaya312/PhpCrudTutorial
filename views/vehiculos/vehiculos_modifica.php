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

    <form id="nuevo" name="nuevo" method="POST" action="index.php?c=vehiculos&a=actualizar" autocomplete="off">
        <input type="hidden" id="id" name="id" value="<?php echo $data["id"]; ?>" />
        Placa: <input type="text" id="placa" name="placa" value="<?php echo  $data["vehiculos"]["placa"] ?>"><br>
        Marca: <input type="text" id="marca" name="marca" value="<?php echo  $data["vehiculos"]["marca"] ?>"><br>
        Modelo: <input type="text" id="modelo" name="modelo" value="<?php echo  $data["vehiculos"]["modelo"] ?>"><br>
        Año: <input type="text" id="anio" name="anio" value="<?php echo  $data["vehiculos"]["anio"] ?>"><br>
        Color: <input type="text" id="color" name="color" value="<?php echo  $data["vehiculos"]["color"] ?>"><br>

        <button id="guardar" name="guardar" type="submit">Guardar</button>
    </form>
</body>

</html>