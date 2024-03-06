<?php
	require 'conexion/database.php';
    $db = new Database();
    $con = $db->conectar();

?>


<!--  -->

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

                <div class="formulario__grupo-input" id="grupo__usuario">
                    <label for="usuario" class="formulario__label">Documento *</label>
                        <div class="">
                            <input type="text" class="formulario__input" name="usuario" id="usuario" placeholder="Documento">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">
                            El documento tiene que ser de 6 a 11 dígitos y solo puede contener numeros.</p>
                </div>

                <!-- div para capturar el nombre -->

                <div class="formulario__grupo-input" id="grupo__nombre">
                    <label for="nombre" class="formulario__label">Nombres *</label>
                        <div class="">
                            <input type="text" class="formulario__input" onkeyup="mayus(this);" name="nombre" id="nombre" placeholder="Nombres">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">
                            El usuario tiene que ser de 12 a 40 dígitos y solo puede contener letras</p>
                </div>

                <!-- Grupo: Contraseña -->
                <div class="formulario__grupo-input">
                    <label for="password" class="formulario__label">Contraseña *</label>
                    <div class="formulario__grupo-input">
                        <input  onkeyup="minus(this);" type="password" class="formulario__input" name="password" id="password">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">La contraseña tiene que ser de 8 a 12 dígitos Alfanumericos.</p>
                </div>

                <!-- Grupo: Contraseña 2 -->
                <div class="formulario__grupo-input" id="grupo__password2">
                    <label for="password2" class="formulario__label">Contraseña </label>
                    <div class="formulario__grupo-input">
                        <input type="password" class="formulario__input" name="password2" id="password2">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
                </div>
        

                <!-- Grupo: Correo Electronico -->
                <div class="formulario__grupo-input" id="grupo__correo">
                    <label for="correo" class="formulario__label">Correo Electrónico *</label>
                    <div class="formulario__grupo-input">
                        <input onkeyup="minus(this);" type="email" class="formulario__input" name="correo" id="correo" placeholder="correo@correo.com">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
                </div>

                <div class="formulario__grupo-input" id="grupo__telefono">
                    <label for="id_tip_use" class="formulario__label">Tipo Usuario *</label>
				    <div class="">                 
                        <select  name="id_tip_use" id="id_tip_use" class="formulario__select" required>
                            <!-- <option value="" selected="">** Seleccione Tipo Usuario **</option> -->
                                <?php
                                   /*Consulta para mostrar las opciones en el select */
                                    $statement = $con->prepare('SELECT * from tip_use WHERE id_tip_use = 1');
                                    $statement->execute();
                                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                                      echo "<option value=" . $row['id_tip_use'] . ">" . $row['tip_use'] . "</option>";
                                    }
                                ?>
                        </select>
                    </div>
                    
                </div>  

                
                <!-- Grupo: Terminos y Condiciones -->
			<div class="formulario__checkbox" id="grupo__terminos">
				<label class="formulario__checkbox">
					<input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
					Acepto los Terminos y Condiciones
				</label>
			</div>

			<div class="formulario__mensaje" id="formulario__mensaje">
				<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
			</div>
            
            <p class="text-center">
                      
            <div class="formulario__grupo-btn-enviar">
                <button type="submit" class="formulario__btn" name="save" value="guardar" >Enviar</button>
                <p class="formulario__mensaje" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
            </div>
                
        
        </form>
   </main>
   <script src="js/jquery.js"></script>
   <script src="js/formulario.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

    <!--  Javascript funcion para convertor en mayusculas y minusculas -->
    <!-- <script src="../js/main.js"></script> -->
    <script>
        function mayus(e) {
        e.value = e.value.toUpperCase();
        }

        function minus(e) {
        e.value = e.value.toLowerCase();
        }
    </script>
  
</body>

</html>
