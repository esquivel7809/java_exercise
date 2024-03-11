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
	<title>consulta animal</title>
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="css/css.css">
</head>

<body>
   <main>
    <script src="js/jquery.js"></script>
        <form  method="POST" autocomplete="off" class="formulario" id="formulario">
            

             

               
               
        

                <div class="selec" id="animals">
                    <label for="id_espe" class="formulario__label">tipo de animal</label>
				    <div class="formulario__grupo-select">               
                        <select  name="id_espe" id="id_espe" class="formulario__select  " required>
                            <!-- <option value="" selected="">** Seleccione Tipo Usuario **</option> -->
                                <?php
                                   /*Consulta para mostrar las opciones en el select */
                                    $statement = $con->prepare('SELECT * from especie ');
                                    $statement->execute();
                                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                                      echo "<option value=" . $row['id_espe'] . ">" . $row['tipo'] . "</option>";
                                    }
                                ?>
                        </select>
                    </div>
                    
                </div>  
                <div class="selec" id="especies">
                    <label for="tipo" class="formulario__label">nombre del animal </label>
				    <div class="formulario__grupo-select">               
                        <select  name="tipo" id="tipo" class="formulario__select" required>
                       
                        </select>
                    </div>
                    
                </div>  
                
               
        
        </form>
   </main>
   <script src="js/jquery.js"></script>
   <script src="js/formulario.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

    <!--  Javascript funcion para convertor en mayusculas y minusculas -->
    <!-- <script src="../js/main.js"></script> -->
    
  <script type="text/javascript">
    $(document).ready(function(){
    $('id_espe').val(0);
    recargarlista();

    $('#id_espe').change(function(){
        recargarlista();
    });
    
    })
  </script>
  <script type="text/javascript">
    function recargarlista(){
        $.ajax({
            type:"POST",
            url:"consultar.php",
            data:"id_espe=" + $('#id_espe').val(),
            success:function(r){
                $('#tipo').html(r);
            }
        })
    }
  </script>
</body>

</html>