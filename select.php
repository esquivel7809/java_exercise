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
	<title>Validación de Formulario con Javascript</title>
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="css/css.css">
</head>

<body>
   <main>
        <form  method="POST" autocomplete="off" class="formulario" id="formulario">
            

                <!-- div para capturar el documento -->
                <div class="formulario__grupo-input" id="grupo__telefono">
                    <label for="id_tip_use" class="formulario__label">tipo de deporte *</label>
				    <div class="formulario__grupo-select">                 
                        <select  name="id_tp_dep" id="id_tp_dep" class="formulario__select" required>
                            <option value="">seleccione...</option>
                            <!-- <option value="" selected="">** Seleccione Tipo Usuario **</option> -->
                                <?php
                                   /*Consulta para mostrar las opciones en el select */
                                    $statement = $con->prepare('SELECT * from tipo_deporte');
                                    $statement->execute();
                                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                                      echo "<option value=" . $row['id_tip_dep'] . ">" . $row['tipo_deporte'] . "</option>";
                                    }
                                ?>
                        </select>
                    </div>
                    
                </div>  
                <div class="formulario__grupo-input" id="select2lista">
                    <label for="id_tip_use" class="formulario__label">deporte *</label>
				    <div class="formulario__grupo-select">                 
                        <select  name="id_dep" id="id_dep" class="formulario__select" required>
                            <option value="">Seleccione...</option>
                        </select>
                    </div>
                    
                </div> 
                
                <!-- Grupo: Terminos y Condiciones -->
		

			<div class="formulario__mensaje" id="formulario__mensaje">
				<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
			</div>
            
            <p class="text-center">
                      
            <div class="formulario__grupo-btn-enviar">
                <button type="submit" class="formulario__btn" name="save" value="guardar" >Enviar</button>
                <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
            </div>
                
        
        </form>
   </main>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

    <!--  Javascript funcion para convertor en mayusculas y minusculas -->
    <!-- <script src="../js/main.js"></script> -->
    <script type="text/javascript">
    $(document).ready(function(){
        $('id_tp_dep').val(0);
        recargar();
        $('#id_tp_dep').change(function(){
        recargar();
    });
    })
    </script>

<script type="text/javascript">
function recargar(){
    $.ajax({
        type:"POST",
        url:"dato.php",
        data: "id_tp_dep=" + $('#id_tp_dep').val(),
        success:function(r){
            $('#id_dep').html(r);
        }
    });
}
</script>
</body>

</html>