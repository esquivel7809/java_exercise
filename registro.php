<?php
require 'conexion/database.php';
$db = new Database();
$con = $db->conectar();

$usu = $_POST['doc'];
$nom = $_POST['nom'];
$colorfav = $_POST['colorfav'];
$celular_fijo = $_POST['celular_fijo'];
$pas = $_POST['pas'];
$email = $_POST['email'];
$tip_usu = $_POST['tip_usu'];

echo $usu;
echo $nom;
echo $colorfav;
echo $celular_fijo;
echo $pas;
echo $email;
echo $tip_usu;


$insertsql = $con->prepare("INSERT INTO user (doc, name, colorfav, celular_fijo, contrasena, email, id_tip_user, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$filaa1 = $insertsql->execute([ $usu, $nom, $colorfav, $celular_fijo, $pas, $email, $tip_usu, 1]);

if ($filaa1) {
    echo '<script>alert("Datos registrados exitosamente");</script>';
} else {
    echo '<script>alert("Error al registrar los datos. Por favor, inténtelo de nuevo.");</script>';
}

?>
