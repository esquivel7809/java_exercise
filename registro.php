<?php
	require 'conexion/database.php';
    $db = new Database();
    $con = $db->conectar();

// Recibe los datos enviados por AJAX
$doc = $_POST['doc'];
$nombre = $_POST['nom'];
$dir = $_POST['dir'];
$edad = $_POST['edad'];
$contra = $_POST['pas'];
$correo = $_POST['email'];
$tip_user = $_POST['tip_usu'];

echo $doc;
echo $nombre;
echo $dir;
echo $edad;
echo $contra;
echo $correo;
echo $tip_user;

// Prepara la consulta SQL para insertar los datos en la base de datos
    if {

        $cifrado = password_hash($contra,PASSWORD_DEFAULT, array("pass"=>12));
        
        $insertSQL = $con->prepare ("INSERT INTO user (doc,name,direccion,edad,contrasena,email,id_tip_user) VALUES ('$doc', '$nombre','$dir', '$edad','$cifrado', '$correo','$tip_user')");
        $insertSQL -> execute();
        echo '<script> alert("REGISTRO EXITOSO");</script>';
     }  




