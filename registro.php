<?php
	require './conexion/database.php';
    $db = new Database();
    $con = $db->conectar();

?>
<?php
$usu = $_POST['usu'];
$nom = $_POST['nom'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$tip_usu = $_POST['tip_usu'];

 echo $usu;
 echo $nom;
 echo $tel;
 echo $email;
 echo $tip_usu;


?>