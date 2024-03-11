<?php
require 'conexion/database.php';
$db = new Database();
$con = $db->conectar();


$departamento = $_POST['departamento'];

$sql = "SELECT id_municipio, municipio FROM municipios WHERE departamento_id = :departamento";

$statement = $con->prepare($sql);

$statement->bindParam(':departamento', $departamento);


$statement->execute();

echo "<label>Municipio</label><br>";
echo "<select id='municipios' name='municipios'>";


while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo "<option value='" . $row['id_municipio'] . "'>" . $row['municipio'] . "</option>";
}

echo "</select>";
?>
