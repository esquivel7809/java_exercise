<?php

require "../conexion/database.php";
$db = new Database();
$con = $db->conectar();

$usu = $_POST['doc'];
$nom = $_POST['nom'];
$nom_m = $_POST['nom_m'];
$nom_p = $_POST['nom:p'];
$pas = $_POST['pas'];
$email = $_POST['email'];
$tip_usu = $_POST['tip_usu'];

echo  $usu;
echo $nom;
echo $nom_m;
echo $nom_p;
echo $email;
echo $tip_usu;
