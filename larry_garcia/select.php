<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección de deportes</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

</head>

<body>


    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h3>Selecciona un instructor:</h3>

                    <label for="" class="form-label"></label>
                    <select id="instructor" name="instructor">
                        <option value="">Selecciona</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h3>Selecciona un deporte:</h3>

                    <label for="" class="form-label"></label>
                    <select id="tipo_deporte" name="tipo_deporte">
                        <option value="">Selecciona</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h3>Selecciona un deporte:</h3>
                    <select id="deporte" name="deporte">
                        <option value="">Primero seleccina un tpo de deporye</option>
                    </select>
                </div>
            </div>
        </div>
    </div>




    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'datos.php',
                type: 'POST',
                success: function(response) {
                    $('#tipo_deporte').html(response);
                }
            });

            $('#tipo_deporte').change(function() {
                var tipoDeporteId = $(this).val();
                $.ajax({
                    url: 'datos1.php',
                    type: 'POST',
                    data: {
                        tipo_deporte_id: tipoDeporteId
                    },
                    success: function(response) {
                        $('#deporte').html(response);
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>