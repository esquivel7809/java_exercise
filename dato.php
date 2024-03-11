<?php
    $conexion=mysqli_connect('localhost','root','','login');

    $especie=$_POST['id_especie'];



    $sql="SELECT * FROM animales WHERE id_especie =$especie";

    $result=mysqli_query($conexion,$sql);
    $cadena="<label>Animales</label><br>
    <select id='animal' name=''>";

    while ($ver=mysqli_fetch_row($result)) {
        $cadena=$cadena.'<option value'.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
    }

    echo $cadena."</select>";
?>
