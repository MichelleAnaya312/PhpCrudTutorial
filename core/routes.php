<?php
//routes.php → Funciones para cargar controladores y acciones

//Carga un controlador
// Si c=vehiculos, entonces:
function cargarControlador($controlador)
{
    $nombreControlador = ucwords($controlador) . "Controller";
    //$nombreControlador = "VehiculosController";

    $archivoControlador = 'controllers/' . ucwords($controlador) . '.php';
    //$archivoControlador = 'controllers/Vehiculos.php';

    //Si el archivo no existe, carga el controlador principal por defecto (CONTROLADOR_PRINCIPAL) definido en config/config.php.
    if (!is_file($archivoControlador)) {
        $archivoControlador = 'controllers/' . CONTROLADOR_PRINCIPAL . '.php';
    }

    //echo $archivoControlador;

    //Incluye el archivo y crea una instancia del controlador dinámicamente
    //Esto permite cargar cualquier controlador sin escribir código adicional así:
    //$controlador = new VehiculosController();
    require_once $archivoControlador;
    $control = new $nombreControlador();
    return $control;
}

//Ejecuta una acción dentro del controlador
function cargarAccion($controller, $accion, $id = null)
{
    if (isset($accion) && method_exists($controller, $accion)) {
        if ($id == null) {
            //Si en la URL está ?c=vehiculos&a=nuevo, la función ejecuta:
            $controller->$accion();
            //Ejemplo: $controller->nuevo();
        } else {
            $controller->$accion($id);
        }
    } else {
        //Si la acción no existe, ejecuta la acción principal (ACCION_PRINCIPAL) definida en config/config.php.
        $controller->ACCION_PRINCIPAL();
    }
}
