<?php 
    $conexion=mysqli_connect('localhost','root','','login');
 

    $id_espe=$_POST['id_espe'];
/*****************************************  CONSULTA DE LOS DATOS ***************************************/


    $sql="SELECT raza.id_animal, raza.animal FROM raza 
    INNER JOIN especie ON especie.id_espe = raza.id_espe 
    WHERE especie.id_espe = '$id_espe'";

    $result=mysqli_query($conexion,$sql);
	$cadena="<label>especie</label><br> 
			<select id='tipo' name='tipo'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
	}

	echo  $cadena."</select>";
	

?>