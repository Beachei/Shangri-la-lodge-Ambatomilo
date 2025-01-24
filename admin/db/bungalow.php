<?php
require '../config/config.php';

$connexion = new mysqli($server,$name,$pwd,$dbname);
if ($connexion->connect_error) {
    die(''.$connexion->connect_error );
};
$id = isset($_POST['id']) ? $_POST['id'] :'';
$bungalow = isset($_POST['bungalow']) ? $_POST['bungalow'] :'';
$rom_id = isset($_POST['rom_id']) ? $_POST['rom_id'] :'';
$sql = "UPDATE reservation SET bungalow = ? , rom_number = ? where id = ?";
$stmt = $connexion->prepare($sql);
$stmt->bind_param('sii',$bungalow,$rom_id,$id);
$result = $stmt->execute();
if($result){
    echo"<h5 class='py-3 col-12 mb-0 text-center text-white green fw-bold affiche'>"."Ce client est assigné au : ". $bungalow." "."N°".$rom_id."</h5>";
};

$stmt->close();
$connexion->close();
?>