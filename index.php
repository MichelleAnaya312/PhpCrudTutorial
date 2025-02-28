<?php
// index.php → Punto de Entrada de la Aplicación

// Contiene configuraciones generales (como constantes).
require_once "config/config.php";

// Maneja las rutas (carga los controladores y acciones).
require_once "core/routes.php";

// Conexión a la base de datos.
require_once "config/database.php";

// Verifica si hay un parámetro 'c' en la URL (?c=vehiculos).
if (isset($_GET['c'])) {
    // Llama a la función cargarControlador() para cargar el controlador solicitado.
    $controlador = cargarControlador($_GET['c']);

    // Si hay un parámetro 'a' en la URL (?c=vehiculos&a=nuevo), ejecuta la acción correspondiente.
    if (isset($_GET['a'])) {
        if (isset($_GET['id'])) {
            cargarAccion($controlador, $_GET['a'], $_GET['id']);
        } else {
            cargarAccion($controlador, $_GET['a']);
        }
    } else {
        // Si no hay 'a', ejecuta la acción principal por defecto.
        cargarAccion($controlador, ACCION_PRINCIPAL);
    }
} else {
    // Si no hay ?c=..., carga el controlador por defecto y ejecuta la acción principal.
    $controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
    cargarAccion($controlador, ACCION_PRINCIPAL);
}

/* Resumen Visual:
Usuario entra a: http://localhost/MVC_php/?c=vehiculos&a=nuevo
|
|--> index.php (Punto de Entrada)
      |--> Carga configuraciones generales (config.php)
      |--> Carga las rutas (routes.php)
      |--> Carga la conexión a la BD (database.php)
      |
      |--> Si ?c=vehiculos existe:
            |--> Llama a cargarControlador('vehiculos')
            |--> Busca controllers/Vehiculos.php y lo carga
            |--> Si ?a=nuevo existe:
                  |--> Llama a cargarAccion(VehiculosController, 'nuevo')
                  |--> Ejecuta nuevo() en VehiculosController
            |--> Si ?a no está definido:
                  |--> Llama a cargarAccion(VehiculosController, ACCION_PRINCIPAL)
      |
      |--> Si ?c no está definido:
            |--> Llama a cargarControlador(CONTROLADOR_PRINCIPAL)
            |--> Llama a cargarAccion(CONTROLADOR_PRINCIPAL, ACCION_PRINCIPAL)
*/
