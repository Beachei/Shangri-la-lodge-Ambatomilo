<?php
require '../config/config.php';

$conn = new mysqli($server, $name, $pwd, $dbname);
if ($conn->connect_error) { 
    die('Connection failed: ' . $conn->connect_error);
}

$sql = "SELECT * FROM bungalow_double";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$nombreDeLigne = $result->num_rows;  // Utilisation de $nombreDeLigne au lieu de $nombreDeligne

$stmt->close();
$conn->close();
echo $nombreDeLigne;  // Affiche le nombre de lignes
?>
