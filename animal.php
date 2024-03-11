<?php

$conexion=mysqli_connect('localhost', 'root', '', 'login');

$especie=$_POST['especie'];


// echo $especie;

$sql ="SELECT animal.id_animal, animal.animal FROM animal
INNER JOIN especie ON  animal.id_esp = especie.id_esp
WHERE especie.id_esp = '$especie'
ORDER BY especie.especie";

$result=mysqli_query($conexion,$sql);
$cadena="<label>Instructor</label><br>
        <select id= 'animal' name= 'animal'>";

while ($ver=mysqli_fetch_row($result)){
        $cadena=$cadena. '<option value=' .$ver[0]. '>' . utf8_encode($ver[1]).'</option>';
}

echo $cadena."</select>";


?>






