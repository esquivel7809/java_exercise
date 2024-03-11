<?php
	$conexion=mysqli_connect('localhost','root','','bd');
 

    $trans=$_POST['trans'];
?>
<?php

    $sql="SELECT animales.id_animal, animales.animal FROM animales
    INNER JOIN especies ON animales.id_especie = especies.id_especie
    WHERE especies.id_especie = '$trans'
    ORDER BY especies.especie ";
    

    $result=mysqli_query($conexion,$sql);
	$cadena="<label>Animales</label><br> 
			<select id='docu' name='name'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
	}

	echo  $cadena."</select>";
	

?>
