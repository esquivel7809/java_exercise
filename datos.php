<?php
$conexion = mysqli_connect("localhost", "root", "", "bd");

$tip_deport = $_POST['id_deporte'];

$sql = "SELECT * FROM deporte INNER JOIN tipo_deporte
        ON deporte.id_tip_dep = tipo_deporte.id_tip_dep 
        WHERE tipo_deporte.id_tip_dep = $tip_deport";

$result = mysqli_query($conexion, $sql);
$cadena = "<label>deporte</label>";
while ($ver = mysqli_fetch_assoc($result)) {
    $cadena .= '<option value=' . $ver['id_deporte'] . '>' . $ver['depor'] . '</option>';
}
echo $cadena . "</select>";

?>