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
$direc = $_POST['direc'];
$tip_usu = $_POST['tip_usu'];

echo $usu;
echo $nom;
echo $ape;
echo $pas;
echo $email;
echo $direc;
echo $tip_usu;

?>
