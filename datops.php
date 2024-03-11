<?php

require 'conexion/database.php';
$db = new Database();
$con = $db->conectar();





$sql="SELECT animales.id_ani, animales.animal FROM animales
    INNER JOIN especies ON animales.id_esp = especies.id_esp 
    WHERE especies.id_esp = '$esp'
    ORDER BY especies.especie" ;

$result=mysqli_query($conexion,$sql);
$cadena="<label>ani</label><br> 
        <select id='ani' name='ani'>";

while ($ver=mysqli_fetch_row($result)) {
    $cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
}

echo  $cadena."</select>";





?>