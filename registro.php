<?php
//conectar bd
require_once("conexion/database.php");
$db = new Database();
$con = $db->conectar();
session_start();
?>
<?php
    
    $doc = $_POST['doc'];
    $nom = $_POST['nom'];
    $pas = $_POST['pas'];
    $email = $_POST['email'];
    $tip_usu = $_POST['tip_usu'];
    $nombre_acu = $_POST['nombre_acu'];
    $tel_cel = $_POST['tel_cel'];


    $sql=$con -> prepare ("SELECT*FROM user where doc = '$doc'");
    $sql -> execute();
    $fila = $sql -> fetchALL(PDO::FETCH_ASSOC);

    if ($doc=="" || $nom=="" || $pas=="" || $email=="" || $tip_usu==""||  $nombre_acu=="" || $tel_cel=="")
    {
    echo '<script>alert("EXISTEN DATOS VACIOS"); </script>';
   
    }
    else if($fila){
    echo '<script>alert("Usuario");</script>';
   
    }
    else {
    $insertSQL = $con->prepare ("INSERT INTO user (doc,name,contrasena,email,id_tip_user,nombre_acu,tel_cel) VALUES ('$doc','$nom', '$pas','$email','$tip_usu','$nombre_acu','$tel_cel')");
    $insertSQL->execute();
    echo '<script>alert("Registro exitoso"); </script>';
  
    }


?>