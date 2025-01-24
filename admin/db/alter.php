<?php 
require "../config/config.php";

$conn = new mysqli($server,$name,$pwd,$dbname);
if($conn->connect_error){
    die("".$conn->connect_error);
}
$id = isset($_POST["id"])? $_POST["id"] : "";
$sql =  "DELETE FROM reservation WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i',$id);
$stmt->execute(); 

$stmt->close();
$conn->close();
?>