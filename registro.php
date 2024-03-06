<?php
	require 'conexion/database.php';
    $db = new Database();
    $con = $db->conectar();

?>
<?php
    $usu = $_POST['doc'];
    $nom = $_POST['nom'];
    $pas = $_POST['pas'];
    $email = $_POST['email'];
    $tip_usu = $_POST['tip_usu'];
    $pin = $_POST['pin'];
    $tel = $_POST['tel'];
    echo $usu;
    echo $nom;
    echo $pas;
    echo $email;
    echo $tip_usu;
    echo $pin;
    echo $tel;
?>

