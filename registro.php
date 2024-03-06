<?php
	require './conexion/database.php';
    $db = new Database();
    $con = $db->conectar();

?>
<?php
$usu = $_POST['usu'];
$nom = $_POST['nom'];
$ape = $_POST['ape'];
$pas = $_POST['pas'];
$email = $_POST['email'];
$tip_usu = $_POST['tip_usu'];
$direc = $_POST['direc'];

 echo $usu;
 echo $nom;
 echo $ape;
 echo $pas; 
 echo $email;
 echo $tip_usu;
 echo $direc;

?>
