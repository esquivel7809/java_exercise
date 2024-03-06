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
$ciudad = $_POST['ciudad'];
$codigo_postal = $_POST['codigo_postal'];
$tip_usu = $_POST['tip_usu'];


echo $usu;
echo $nom;
echo $pass;
echo $email;
echo $ciudad;
echo $codigo_postal;
echo $tip_usu;
