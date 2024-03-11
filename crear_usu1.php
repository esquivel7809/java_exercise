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
    <title>VALIDACION CON JAVASCRIPT</title>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/css.css">
</head>

<body>
    <main>
        <form method="POST" autocomplete="off" class="departamento" id="departamento" >

            <div class="formulario__grupo-input" id="grupo__telefono">
                <label for="id_tip_use" class="formulario__label">Departamento</label>
                <div class="formulario__grupo-select">               
                    <select  name="depar" id="depar" class="formulario__select  " required>
                        <!-- <option value="" selected="">** Seleccione Tipo Usuario **</option> -->
                            <?php
                                /*Consulta para mostrar las opciones en el select */
                                $statement = $con->prepare('SELECT * from depar  ');
                                $statement->execute();
                                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option value=" . $row['id_depart'] . ">" . $row['depart'] . "</option>";
                                }
                            ?>
                    </select>
                </div>

                <div class="formulario__grupo-input" id="ciudad">
                    <label for="usuario" class="formulario__label">ciudad</label>
                    <div class="formulario__grupo-input">
                        <select  name="ciudad" id="ciudad" class="formulario__select  " >
                    </div>
                    
                </div>



                <p class="text-center">
                      
            <div class="formulario__grupo-btn-enviar">
                <button type="submit" class="formulario__btn" class="formulario__btn:hover" name="save" value="guardar" >Enviar</button>
                <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
            </div>

        </form>
    </main>
    <script src="js/jquery.js"></script>
    <script src="./js/formulario.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

    <!--  Javascript funcion para convertir en mayúsculas y minúsculas -->

    <script type="text/Javascript" >
        $(departamento).ready(function(){
            $('#depar').val(0);
            recargarLista();

            $('#depar').change(function(){
                recargarLista();
            });
        })
    </script>
    // <!-- <script src="../js/main.js"></script>
    // <script>
    //     function mayus(e) {
    //         e.value = e.value.toUpperCase();
    //     }

    //     function minus(e) {
    //         e.value = e.value.toLowerCase();
    //     }
    // </script> -->
    <script type="text/Javascript">
        function recargarLista() {
            $.ajax({
                type: "POST",
                url: "datos.php",
                data:{"depar": $('#depar').val()},
                success:function(r){
                    $('#ciudad').html(r);
                }
            });
        }
    </script>

</body>

</html>
