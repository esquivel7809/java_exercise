<?php
	require 'conexion/database.php';
    $db = new Database();
    $con = $db->conectar();

?>
<?php
    $usu = $_POST ['doc'];
    $nom = $_POST ['nom'];
    $pas = $_POST ['pas'];
    $email = $_POST ['email'];
    $tip_usu = $_POST ['tip_usu'];

    echo $usu;
    echo $nom;
    echo $pas;
    echo $email;
    echo $usutip_usu;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Kenner Calderon Rojas</h1>
</body>
</html>