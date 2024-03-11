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
    <title>Animal</title>
</head>
<body>
<main>
    <form action="" method="POST">
        <div id="select_lista">
            <label for="especie">Seleccione la especie</label>
                <select name="especie" id="id_especie">
                    <option value="">Seleccione la especie</option>

                    <?php
                                   /*Consulta para mostrar las opciones en el select */
                                    $statement = $con->prepare('SELECT * from especies');
                                    $statement->execute();
                                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                                      echo "<option value=" . $row['id_especie'] . ">" . $row['especie'] . "</option>";
                                    }
                                ?>
                </select>
        </div>
    <select name="" id="animal">
        <option value=""></option>

    </select>

    </form>
</main>


</body>
</html>
<script src="js/jquery.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
            $('#id_especie').val(0);
            recargarlista();

            $('#id_especie').change(function(){
                recargarlista();
            });   
               
        })
</script>

<script type="text/javascript">
        function recargarlista(){
          $.ajax({
            type: "POST",
            url:"especie.php",
            data:"id_especie=" + $('#id_especie').val(),
            success:function(r){
                $('#animal').html(r);
            }
        });
    }
    </script>