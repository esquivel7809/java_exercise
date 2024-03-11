<?php
$conexion=mysqli_connect('localhost', 'root','','login');

$id_tp_dep = $_POST ['id_tp_dep'];

$sql="SELECT deporte.id_dep, deporte.nom_dep FROM tipo_deporte INNER JOIN deporte ON tipo_deporte.id_tip_dep = deporte.tp_dep
AND tipo_deporte.id_tip_dep = '$id_tp_dep'";

$result=mysqli_query($conexion,$sql);
$cadena="<label>deporte</label><br>
<select  nom_dep='nom_dep'>";

while($ver=mysqli_fetch_row($result)) {

$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_decode($ver[1]).' </option>';
}
echo $cadena."</select>";

?>