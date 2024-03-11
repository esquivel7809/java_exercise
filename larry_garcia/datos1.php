<?php
require_once '../conexion/Database.php';

$db = new Database();
$conn = $db->conectar();

$tipoDeporteId = $_POST['tipo_deporte_id'];

$sql = "SELECT * FROM deportes WHERE tipo_deporte_id = :tipoDeporteId";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':tipoDeporteId', $tipoDeporteId);
$stmt->execute();

$options = '<option value="">Selecciona aqui tu deporte</option>';
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $options .= '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>';
}

echo $options;

$conn = null;
