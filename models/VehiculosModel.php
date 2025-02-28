<?php

class Vehiculos_model
{
    private $db; // Variable para almacenar la conexión a la base de datos
    private $vehiculos; // Array para almacenar la lista de vehículos obtenidos de la base de datos

    // Constructor: Se ejecuta automáticamente al instanciar la clase
    public function __construct()
    {
        // Establece la conexión a la base de datos utilizando la clase Conectar
        $this->db = Conectar::conexion();

        // Inicializa el array $vehiculos como un array vacío
        $this->vehiculos = array();
    }

    // Método para obtener todos los vehículos de la base de datos
    public function get_vehiculos()
    {
        // Consulta SQL para seleccionar todos los registros de la tabla "vehiculos"
        $sql = "SELECT * FROM vehiculos";
        $stmt = $this->db->prepare($sql); // Prepara la consulta SQL
        $stmt->execute(); // Ejecuta la consulta SQL

        // Obtiene el resultado de la consulta (solo para consultas SELECT)
        $resultado = $stmt->get_result();

        // Recorre el resultado fila por fila y las almacena en el array $vehiculos
        while ($row = $resultado->fetch_assoc()) {
            $this->vehiculos[] = $row; // Agrega cada fila al array
        }

        return $this->vehiculos; // Devuelve el array con los vehículos obtenidos
    }

    // Método para insertar un nuevo vehículo en la base de datos
    public function insertar($placa, $marca, $modelo, $anio, $color)
    {
        // Sentencia SQL con marcadores de posición (?) para evitar inyección SQL
        $sql = "INSERT INTO vehiculos (placa, marca, modelo, anio, color) VALUES (?, ?, ?, ?, ?)";

        // Prepara la consulta SQL
        $stmt = $this->db->prepare($sql);

        // Vincula los valores a los marcadores de posición de la consulta
        $stmt->bind_param("sssis", $placa, $marca, $modelo, $anio, $color);

        /* Tipos de datos en bind_param():
           "s" → String (texto)
           "i" → Integer (número entero)
           "d" → Double (número decimal)
           "b" → Blob (datos binarios)
           En este caso, los primeros 3 valores (placa, marca y modelo) son strings (s),
           anio es un entero (i), y color es un string (s).
        */

        return $stmt->execute(); // Ejecuta la consulta y devuelve true si fue exitosa o false en caso de error
    }

    // Método para actualizar los datos de un vehículo existente
    public function modificar($id, $placa, $marca, $modelo, $anio, $color)
    {
        // Sentencia SQL para actualizar los datos de un vehículo en base a su ID
        $sql = "UPDATE vehiculos SET placa=?, marca=?, modelo=?, anio=?, color=? WHERE id=?";

        // Prepara la consulta SQL
        $stmt = $this->db->prepare($sql);

        // Vincula los valores a los marcadores de posición de la consulta
        $stmt->bind_param("sssisi", $placa, $marca, $modelo, $anio, $color, $id);

        /* Tipos de datos en bind_param():
           "s" → String (texto)
           "i" → Integer (número entero)
           "d" → Double (número decimal)
           "b" → Blob (datos binarios)
           En este caso, los primeros 3 valores (placa, marca y modelo) son strings (s),
           anio es un entero (i), color es un string (s), y el ID es un entero (i).
        */

        return $stmt->execute(); // Ejecuta la consulta y devuelve true si fue exitosa o false en caso de error
    }

    // Método para eliminar un vehículo de la base de datos por su ID
    public function eliminar($id)
    {
        // Sentencia SQL para eliminar un vehículo en base a su ID
        $sql = "DELETE FROM vehiculos WHERE id=?";

        // Prepara la consulta SQL
        $stmt = $this->db->prepare($sql);

        // Vincula el ID como un entero a la consulta
        $stmt->bind_param("i", $id);

        return $stmt->execute(); // Ejecuta la consulta y devuelve true si fue exitosa o false en caso de error
    }

    // Método para obtener un solo vehículo de la base de datos por su ID
    public function get_vehiculo($id)
    {
        // Sentencia SQL para seleccionar un vehículo específico por su ID
        $sql = "SELECT * FROM vehiculos WHERE id=? LIMIT 1";

        // Prepara la consulta SQL
        $stmt = $this->db->prepare($sql);

        // Vincula el ID como un entero a la consulta
        $stmt->bind_param("i", $id);

        // Ejecuta la consulta SQL
        $stmt->execute();

        // Obtiene el resultado de la consulta (solo para consultas SELECT)
        $resultado = $stmt->get_result();

        return $resultado->fetch_assoc(); // Devuelve un array con los datos del vehículo encontrado
    }
}
