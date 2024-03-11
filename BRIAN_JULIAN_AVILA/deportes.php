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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <main>
        <form action="">
            <div class="form-group">
                <label for="id_tp_deporte">Tipo de deporte:</label>
                <select class="form-control" id="id_tp_deporte" name="id_tp_deporte" required>
                    <option value="" disabled selected>Selecciona un tipo de deporte</option> <!-- Placeholder -->
                    <?php
                    $tiposherrasQuery = $con->prepare("SELECT * FROM tipo_deporte");
                    $tiposherrasQuery->execute();
                    $tiposherra = $tiposherrasQuery->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($tiposherra as $tipoherra) : ?>
                        <option value="<?php echo $tipoherra['id_tp_deporte']; ?>"><?php echo $tipoherra['nombre_tp_deporte']; ?></option>
                    <?php endforeach; ?>
                </select>
                        
            </div>

            <div class="" id="">
                <div class="conte" id="select_list">
                    <label for="id_deporte" class="formulario__label">Deporte *</label>
                    <div class="formulario__grupo-select">
                        <select name="id_deporte" id="id_deporte" class="formulario__select ">
                           

                        </select>
                    </div>
                </div>

        </form>
    </main>
    <script type="text/Javascript">
        $(document).ready(function () {
        $('#id_tp_deporte').val(0);
        recargarlista();
        $('#id_tp_deporte').change(function(){
            recargarlista();
        });
        
    })
</script>
    <script type="text/Javascript">
        function recargarlista(){
            $.ajax({
                type:"POST",
                url:"deportes2.php",
                data:{id_tp_deporte: $('#id_tp_deporte').val()},
                success:function (r) {
                    $('#id_deporte').html(r)
                    
                }

            })
        }

    </script>
</body>

</html>