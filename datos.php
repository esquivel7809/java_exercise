<?php
require 'conexion/database.php';
$db = new Database();
$con = $db->conectar();

$depar = $_POST['depar']; // Corregir la asignación

$statement = $con->prepare('SELECT * FROM ciudad INNER JOIN depar ON depar.id_depart = ciudad.id_depart WHERE ciudad.id_depart = ?');
$statement->execute([$depar]);

$cadena = "<label> ciudad</label><br>
        <select id='ciudad' name='ciudad'>";

while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $cadena .= "<option value=" . $row['id_ciudad'] . ">" . $row['ciudad'] . "</option>";
}

$cadena .= "</select>"; // Cerrar la etiqueta select
echo $cadena;
?>
