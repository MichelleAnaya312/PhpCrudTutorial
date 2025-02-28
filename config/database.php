<?php

//Clase para manejar la conexión a la base de datos.
class Conectar
{

    //static: se puede llamar sin necesidad de instanciar la clase.
    public static function conexion()
    {
        $conexion = new mysqli("localhost", "root", "", "mvcPhp", "3310");
        return $conexion;
        /*Se devuelve el objeto $conexion, que representa la conexión a la base de datos.
        Esto permite que cualquier parte de la aplicación que necesite conectarse a MySQL simplemente llame a Conectar::conexion() para obtener la conexión.*/
    }
}
