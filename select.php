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
 <link rel="stylesheet" href="css/estilos.css">
 <script src="js/jquery.js"></script>
 <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</head>

<body>
   <main>
        <form method="POST" autocomplete="off" class="formulario" id="formulario">


        <div class="formulario__grupo-input" id="grupo__telefono">
                    <label for="id_tip_depor" class="formulario__label">Tipo Deporte *</label>
        <div class="">                 
                        <select name="id_tip_depor" id="id_tip_depor" class="formulario__select" required>
                            <!-- <option value="" selected="">** Seleccione Tipo Usuario **</option> -->
                                <?php
                                   /*Consulta para mostrar las opciones en el select */
                                    $statement = $con->prepare('SELECT * from tipo_depor');
                                    $statement->execute();
                                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                                      echo "<option value=" . $row['id_tip_depor'] . ">" . $row['tipo_depor'] . "</option>";
                                    }
                                ?>
                        </select>
                    </div>

        
                    <div class="formulario__grupo-input" id="grupo__telefono">
                    <label for="deporte" class="formulario__label">Deporte *</label>
        <div class="">                 
                        <select name="id_depor" id="id_depor" class="formulario__select" required>
                            <!-- <option value="" selected="">** Seleccione Tipo Usuario **</option> -->
                               
                        </select>
                    </div>
                    
                </div>  

                
        </form>
                            

    <script type="text/javascript">
    $(document).ready(function(){
        $('#id_tip_depor').val(0);
        recargarLista();

        $('#id_tip_depor').change(function(){
            recargarLista();

        });
    })
</script>

    <script type="text/javascript">
        function recargarLista(){
            $.ajax({
                type:"POST",
                url:"datos.php",
                data:"id_depor" + $('#id_tip_depor').val(),
                success:function(r){
                    $('#id_depor').html(r);
                }
            });
         }

</script>

</body>

</html>
  


