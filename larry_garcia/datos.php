<?php
require_once '../conexion/Database.php';

$db = new Database();
$conn = $db->conectar();

$sql = "SELECT * FROM tipos_deporte";
$result = $conn->query($sql);

$options = '<option value="">Selecciona...</option>';
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $options .= '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>';
}

echo $options;
$conn = null;
