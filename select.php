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
</head>
<body>
<main>
    <form method="POST" autocomplete="off" class="">
    
            <label for="especie">Selecciones una especie</label>
             <select name="especie" id="id_especie">
                <option value="">selecciones especie</option>

                <?php
                     /*Consulta para mostrar las opciones en el select */
                    $statement = $con->prepare('SELECT * from especie');
                    $statement->execute();
                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value=" . $row['id_especie'] . ">" . $row['especie'] . "</option>";
                    }
                                ?>
             </select>
     </div>
     <div id="select_lista">
            <select name="" id="animal">
         <option value=""></option>
        
            </select>
    </form>
    </main>
</body>
</html>


<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
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
                type: "post",
                url:"dato.php",
                data:"id_especie=" + $('#id_especie').val(),
                sucess:function(r){
                    $('#animal').html(r);
                }
            });
    }
    </script>