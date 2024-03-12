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
  <title>Document</title>
</head>
<body>
<form action="" class="formulario" id="formulario">

      <select name="id_dep" id="id_dep">
          <option value="">SELECCIONE EL DEPARAMENTO</option>
          <?php 
                  $equipos =$conexion->prepare("SELECT * FROM depar ");
                  $equipos->execute();
                  while($fila = $equipos-> fetch(PDO::FETCH_ASSOC)){
                      echo "<option value = " . $fila['id_dep'] . ">" . $fila['nombre_depar']. "</option>";

                  }
          ?>
      </select>

      <div class="formulario__grupo" id="grupo__doc">
              <label for="doc" class="formulario__label">ciudad</label>
              <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="ciudad" id="ciudad" placeholder="doc">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
              </div>
			</div>
</form>      



  <main method="POST" ></main>
</body>
  <script></script>

  <script type="text/javascript">
  $(formulario).ready(function(){
      $('#id_dep').val(0);
      recargarLista();

      $('#id_dep').change(function(){
      recargarLista();
      });
    })

  </script>

  <script type="text/javascript">
    function recargarLista(){
      $.ajax({
        type:"POST",
        url:"datos.php",
        data:{"dep" ('#id_dep').val()},
        sucess:function(r){
          $('#ciudad').html(r);
        }

      });
    }
  </script>
</html>
