<?php
require 'conexion/database.php';
$db = new Database();
$con = $db->conectar();

$usu = $_POST['doc'];
$nom = $_POST['nom'];
$colorfav = $_POST['colorfav'];
$cel = $_POST['cel'];
$pas = $_POST['pas'];
$email = $_POST['email'];
$tip_usu = $_POST['tip_usu'];

echo $usu;
echo $nom;
echo $colorfav;
echo $cel;
echo $pas;
echo $email;
echo $tip_usu;


$insertsql = $con->prepare("INSERT INTO user (doc, name, colorfav, celular_fijo, contrasena, email, id_tip_user, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$filaa1 = $insertsql->execute([ $usu, $nom, $colorfav, $cel, $pas, $email, $tip_usu, 1]);

if ($filaa1) {
    echo '<script>alert("Datos registrados exitosamente");</script>';
} else {
    echo '<script>alert("Error al registrar los datos. Por favor, inténtelo de nuevo.");</script>';
}

?>
