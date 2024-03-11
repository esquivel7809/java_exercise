<?php
	require 'conexion/database.php';
    $db = new Database();
    $con = $db->conectar();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animales</title>
	<link rel="stylesheet" href="css/css.css">
</head>
<body>
<form  method="POST" autocomplete="off" class="formulario" id="formulario">

</form>
<div class="formulario__grupo-select" id="formulario_grupo-input">
                    <label for="trans" class="formulario__label">Especie *</label>
				    <div class="formulario__grupo-select">                 
                        <select class="formulario__select" name="trans" id="trans" required>
                        <option value="" selected="">Seleccione Una especie </option>
                                <?php
                                    $statement = $con->prepare('SELECT * from especies WHERE id_especie');
                                    $statement->execute();
                                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                                      echo "<option value=" . $row['id_especie'] . ">" . $row['especie'] . "</option>";
                                    }
                                ?>
                        </select>
                    </div>

                    <div class="formulario_grupo-input" id="formulario_grupo-input">
                <div class="conte" id="select2lista">
                    <label for="docum" class="formulario__label">Animal *</label>
                        <div class="formulario__grupo-select">
                            <select class="formulario__select" name="docum" id="docum" required>
                                <option value="" selected="">Seleccione el Animal </option>
                                
                            </select>
                        </div>
                </div>
                </div>
<script src="js/jquery.js">
</script>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>



<script type="text/javascript">
	$(document).ready(function(){
		$('#trans').val(0);
		recargarLista();

		$('#trans').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"animales.php",
			data:"trans=" + $('#trans').val(),
			success:function(r){
				$('#docum').html(r);
			}
		});
	}
</script>

</body>
</html>



