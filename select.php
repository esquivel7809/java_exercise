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
    <script src="js/jquery.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</head>

<body>
<main>
    <form class="formulario" method="POST" autocomplete="off" id="">

        <div class="formulario__grupo-input" id="grupo__deporte">
            <label for="id_tip_dep" class="formulario__label">Tipo de Deporte *</label>
            <div class="formulario__grupo-select">
                <select name="id_tip_dep" id="id_tip_dep" class="formulario__select" required>
                    <option value="">Seleccione el Tipo_deporte</option>
                    <?php
                    /*Consulta para mostrar las opciones en el select */
                    $statement = $con->prepare('SELECT * from tipo_deporte');
                    $statement->execute();
                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value=" . $row['id_tip_dep'] . ">" . $row['deporte'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="formulario__grupo-input" id="select2lista">
                <label for="depor" class="formulario__label">Deporte *</label>
                <select name="id_deporte" id="id_deporte" class="formulario__select" required>
                </select>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#id_tip_dep').val(0);
            recargarLista();

            $('#id_tip_dep').change(function(){
                recargarLista();
            });
        })
    </script>

    <script type="text/javascript">
        function recargarLista(){
            $.ajax({
                type:"POST",
                url:"datos.php",
                data:"id_tip_dep=" + $('#id_tip_dep').val(),
                success:function(r){
                    $('#id_deporte').html(r);
                }
            });
         }
    </script>
</body>
</html>