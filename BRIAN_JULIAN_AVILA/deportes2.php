<?php
require_once("conexion/database.php");
$db = new Database();
$conectar = $db->conectar();


$id_tp_deporte = $_POST['id_tp_deporte'];


$tipo_query = $conectar->prepare("SELECT deportes.id_deporte, deportes.Nombre_deporte 
                                  FROM deportes 
                                  INNER JOIN tipo_deporte 
                                  ON tipo_deporte.id_tp_deporte = deportes.id_tp_deporte 
                                  WHERE deportes.id_tp_deporte = ?");
$tipo_query->execute([$id_tp_deporte]);


$options = "<option value=''>SELECCIONA UN DEPORTE</option>";


while ($row = $tipo_query->fetch(PDO::FETCH_ASSOC)) {
    $options .= '<option value="' . $row["id_deporte"] . '">' . $row["Nombre_deporte"] . '</option>';
}


echo $options;
