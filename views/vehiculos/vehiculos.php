<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data["titulo"]; ?></title>
</head>

<body>
    <h2><?php echo $data["titulo"]; ?></h2>

    <a href="index.php?c=vehiculos&a=nuevo">Agregar</a>
    <br>
    <br>
    <table border=" 1" width="80%">
        <thead>
            <tr>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Color</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data["vehiculos"] as $dato) {
                echo "<tr>";
                echo "<td>" . $dato["placa"] . "</td>";
                echo "<td>" . $dato["marca"] . "</td>";
                echo "<td>" . $dato["modelo"] . "</td>";
                echo "<td>" . $dato["anio"] . "</td>";
                echo "<td>" . $dato["color"] . "</td>";
                echo "<td><a href='index.php?c=vehiculos&a=modificar&id=" . $dato["id"] . "'>Modificar</a> </td>";
                echo "<td><a href='index.php?c=vehiculos&a=eliminar&id=" . $dato["id"] . "'>Eliminar</a> </td>";
                echo "</tr>";
            } ?>
        </tbody>
    </table>
</body>

</html>