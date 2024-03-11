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
    
    <title>Ejercicio Select</title>
</head>

<body>
    <main>
        <form method="post" class="formulario" id="">
            <div class="formulario__grupo-input" id="">
            <label  class="formulario__label">Departamento *</label>
                <div class="formulario__grupo-select">
                    <select name="" id="departamento" class=" formulario__select" required>
                        <?php
                        $statement = $con->prepare('SELECT * from depar');
                        $statement->execute();
                        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value=" . $row['id_depart'] . ">" . $row['depart'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <br>

            <div class="formulario__grupo-input" id="municipios">
            <label  class="formulario__label">Ciudad-municipios*</label>
                <div class="formulario__grupo-select">
                    <select name="" id="" class="formulario__select" required>

                    </select>
                </div>

            </div>


        </form>
    </main>
</body>
<script src="js/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#departamento').val(0);
        recargarLista();

        $('#departamento').change(function() {
            recargarLista();
        });
    });
</script>

<script type="text/javascript">
    function recargarLista() {
        $.ajax({
            type: "POST",
            url: "datos.php",
            data: "departamento=" + $('#departamento').val(),
            success: function(r) {
                $('#municipios').html(r);
            }
        });
    }
</script>

</html>