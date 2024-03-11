<?php
require 'conexion/database.php';
$db = new Database();
$con = $db->conectar();

// Obtener el valor del departamento seleccionado
$departamento = $_POST['departamento'];

// Consulta SQL para obtener los municipios del departamento seleccionado
$sql = "SELECT id_municipio, municipio FROM municipios WHERE departamento_id = :departamento";

// Preparar la consulta
$statement = $con->prepare($sql);

// Asignar valor al parámetro del departamento
$statement->bindParam(':departamento', $departamento);

// Ejecutar la consulta
$statement->execute();

// Generar la etiqueta y el select para mostrar los municipios
echo "<label>Seleccione</label><br>";
echo "<select id='municipios' name='municipios'>";

// Iterar sobre los resultados y generar las opciones del select
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo "<option value='" . $row['id_municipio'] . "'>" . $row['municipio'] . "</option>";
}

echo "</select>";
?>