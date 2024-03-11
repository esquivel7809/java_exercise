<?php

require 'conexion/database.php';
$db = new Database();
$con = $db->conectar();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/anim.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/jquery.js"></script>
</head>
<body>
    <div class="formulario">
        <label for="esp">Especie:</label>
        <select name="esp" id="esp">
            <option value="opcion1">Seleccion una especie:</option>
            <?php
              /*Consulta para mostrar las opciones en el select */
              $statement = $con->prepare('SELECT * from especies WHERE id_esp');
              $statement->execute();
              while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
              echo "<option value=" . $row['id_esp'] . ">" . $row['especie'] . "</option>";
            }
            ?>
        </select>

        <div id="selectlista">
            <label for="ani">Selecciona el animal:</label>
            <select id="ani" name="ani">
                <option value="opcionA"></option>
            </select>           
        </div>
        
    </div>
   

     <script type="text/javascript">
        $(document).ready(function(){
            $('#esp').val(0);
            recargarlista();

            $('#esp').change(function(){
                recargarlista();
            });
        })
     </script>
     <script type="text/javascript">
        function recargarlista(){
            $.ajax({
                type:"POST",
                url: "datops.php",
                data: "esp=" + $('#esp').val(),
                success:function(r){
                    $('ani').html(r);
                }

            })
        }
     </script>
  
</body>
</html>
