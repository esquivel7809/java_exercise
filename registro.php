<?php
require 'conexion/database.php';
$db = new Database();
$con = $db->conectar();



$validacion=0;


$usu = $_POST['doc'];
$nom = $_POST['nom'];
$pass = $_POST['pass'];
$email = $_POST['email'];
$ciudad = $_POST['ciudad'];
$codigo_postal = $_POST['codigo_postal'];
$tip_usu = $_POST['tip_usu'];

// echo $usu;
// echo $nom;
// echo $pass;
// echo $email;
// echo $ciudad;
// echo $codigo_postal;
// echo $tip_usu;



$sql= $con -> prepare ("SELECT * FROM user WHERE doc='$usu'");
 $sql -> execute();
 $fila = $sql -> fetchAll(PDO::FETCH_ASSOC);

 if ($fila){
    echo '<script>alert ("ESTE PAQUETE YA EXISTE //CAMBIELO//"):</script>';
    $validacion=0; 
 }
 else {
    $cifrado = password_hash($pass,PASSWORD_DEFAULT, array("pass"=>12));

    $insertSQL = $con->prepare ("INSERT INTO user (doc,name,contrasena,email,ciudad,codigo_postal,id_tip_user) VALUES ('$usu', '$nom', '$pass', '$email', '$ciudad', '$codigo_postal', '$tip_usu')");
    $insertSQL -> execute();
    $validacion=1;
 }

?>

<script src="formulario.js"></script>


