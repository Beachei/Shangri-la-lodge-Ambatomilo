<?php 
require '../config/config.php';

$connexion = new mysqli($server,$name,$pwd,$dbname);
if($connexion->connect_error){
    die("".$connexion->connect_error);
};
$id =  isset($_POST['id'])? $_POST['id']:"";
$payer =  isset($_POST['status'])? $_POST['status']:"";
$sql = "UPDATE reservation SET payer =? WHERE id = ?";
$stmt = $connexion->prepare($sql);
$stmt->bind_param("ii",$payer,$id);
if($stmt->execute()){
    echo"Supprimer avec succes"." ".$id;
}else{
    echo"Pas suprimer";
}



$stmt->close();
$connexion->close();
?>