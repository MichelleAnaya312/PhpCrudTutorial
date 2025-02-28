<?php
class VehiculosController
{

     //Se ejecuta automáticamente al instanciar la clase.
    public function __construct()
    {
        require_once "models/VehiculosModel.php";
        //necesario para poder utilizar los métodos del modelo.
    }


    //Muestra la lista de vehículos
    public function index()
    {
        /*Importa el archivo VehiculosModel.php y se crea un objeto $vehiculos del modelo Vehiculos_model().*/
        require_once "models/VehiculosModel.php";
        $vehiculos = new Vehiculos_model();

        //Se usa en la vista para mostrar un título.
        $data["titulo"] = "Vehiculos";

        //Llama al método get_vehiculos() del modelo, que obtiene los datos de la base de datos.
        $data["vehiculos"] = $vehiculos->get_vehiculos();

        //Finalmente, carga la vista views/vehiculos/vehiculos.php para mostrar los datos al usuario
        require_once "views/vehiculos/vehiculos.php";
    }

    //Muestra el formulario para agregar un vehículo
    public function nuevo()
    {
        //Se usa en la vista para mostrar un título.
        $data["titulo"] = "Vehiculos";

        //Carga la vista del formulario views/vehiculos/vehiculos_nuevo.php
        require_once "views/vehiculos/vehiculos_nuevo.php";
    }

    //Guarda un nuevo vehículo
    public function guarda()
    {
        //Se obtienen los datos enviados por el formulario mediante $_POST.
        $placa = $_POST['placa'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $anio = $_POST['anio'];
        $color = $_POST['color'];

        //Se crea un objeto de Vehiculos_model y se llama al método insertar().
        $vehiculos = new Vehiculos_model();
        $vehiculos->insertar($placa, $marca, $modelo, $anio, $color);

        //Se usa en la vista para mostrar un título.
        $data["titulo"] = "Vehiculos";

        //Se redirige a la lista de vehículos llamando a $this->index().
        $this->index();
    }

    //Cargar el formulario de edición con los datos del vehículo seleccionado.
    public function modificar($id)
    {
        $vehiculos = new Vehiculos_model();

        //Se obtiene el ID del vehículo a modificar.
        $data["id"] = $id;
        //Se crea un objeto del modelo y se obtiene el vehículo con get_vehiculo($id).
        $data["vehiculos"] = $vehiculos->get_vehiculo($id);

        //Se usa en la vista para mostrar un título.
        $data["titulo"] = "Vehiculos";

        //Se envían los datos a la vista vehiculos_modifica.php.
        require_once "views/vehiculos/vehiculos_modifica.php";
    }

    //Actualiza los datos de un vehículo
    public function actualizar()
    {
        //Se obtienen los datos enviados por el formulario ($_POST).
        $id = $_POST['id'];
        $placa = $_POST['placa'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $anio = $_POST['anio'];
        $color = $_POST['color'];

        //Se crea un objeto de Vehiculos_model y se llama al método modificar().
        $vehiculos = new Vehiculos_model();
        $vehiculos->modificar($id, $placa, $marca, $modelo, $anio, $color);

        //Se usa en la vista para mostrar un título.
        $data["titulo"] = "Vehiculos";

        //Se redirige a la lista de vehículos con $this->index().
        $this->index();
    }

    //Elimina un vehículo
    public function eliminar($id)
    {

        $vehiculos = new Vehiculos_model();
        //Se crea un objeto de Vehiculos_model y se llama al método eliminar().
        $vehiculos->eliminar($id);

        //Se usa en la vista para mostrar un título.
        $data["titulo"] = "Vehiculos";

        //Se redirige a la lista de vehículos.
        $this->index();
    }
}
