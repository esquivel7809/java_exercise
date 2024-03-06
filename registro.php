<?php
require 'conexion/database.php';
$db = new Database();
$con = $db->conectar();

?>

<?php

$usu = $_POST['doc'];
$nom = $_POST['nom'];
$pass = $_POST['password'];
$email = $_POST['email'];
$tip_usu = $_POST['tip_usu'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

echo $usu;
echo $nom;
echo $pass;
echo $email;
echo $tip_usu;
echo $direccion;
echo $telefono;


?>