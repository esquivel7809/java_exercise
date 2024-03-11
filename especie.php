<?php
$conexion=mysqli_connect('localhost','root','','login');

$especie=$_POST['id_especie'];


// $sql="SELECT especies.id_especie, animales.animal FROM especies, animales Where animales.id_especie = $|especie";
$sql="SELECT especies.especie, animales.animal FROM especies 
INNER JOIN animales ON animales.id_especie=$especie";

$result=mysqli_query($conexion,$sql);
$cadena="<label>Animales</label><br>
        <select id='' name''></select>";

while ($ver=mysqli_fetch_row($result)) {
    $cadena=$cadena. '<option value=' . $ver [0].'>'.utf8_encode($ver[1]).'</option>';
}

echo $cadena."</select>";