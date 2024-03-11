<?php
$conexion = mysql_connect("localhost", "root", "", "bd");


$tip_depor = $_POST['id_depor'];

$sql = "SELECT * FROM deportes INNER JOIN tipo_depor
ON deportes.id_tip_depor = tipo_depor.id_tip_depor
WHERE tipo_depor.id_tip_depor = $tip_depor";

$result = mysqli_query($conexion, $sql);
$cadena = "<label>deporte</label>"; 
while ($ver = mysqli_fetch_assoc($result)) {
    $cadena .= '<option value='. $ver['id_depor']. '>' . $ver['deporte'] . '</option>';

}
echo $cadena . "</select>";


?> 