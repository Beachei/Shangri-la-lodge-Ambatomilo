<?php
require '../config/config.php';

$conn = new mysqli($server, $name, $pwd, $dbname);
if ($conn->connect_error) { 
    die('Connection failed: ' . $conn->connect_error);
}

$sql = "SELECT * FROM bungalow_familiale";
$result = $conn->query($sql);
$nombreDeLigne = $result->num_rows;  // Utilisation de $nombreDeLigne au lieu de $nombreDeligne

$conn->close();
echo $nombreDeLigne;  // Affiche le nombre de lignes
?>
