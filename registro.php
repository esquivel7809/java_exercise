<?php
    require'conexion/database.php';
    $db = new Database();
    $con = $db->conectar();

?>

<?php

    $usu = $_POST['doc'];
    $nom = $_POST['nom'];
    $ape = $_POST['ape'];
    $pin = $_POST['pin'];
    $pas = $_POST['pas'];
    $email = $_POST['email'];
    $tip_usu = $_POST['tip_usu'];
    echo $usu;
    echo $nom;
    echo $ape;
    echo $pin;
    echo $pas;
    echo $email;
    echo $tip_usu;

?>