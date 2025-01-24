<?php
session_start();
require 'config/config.php';
echo $server,$name,$pwd,$dbname;
$connexion = new mysqli($server,$name,$pwd,$dbname);
if($connexion->connect_error){
    die(''. $connexion->connect_error);
};
$id = isset($_POST['identifiant']) ?$_POST['identifiant'] :0;
$password = isset($_POST['password']) ?$_POST['password'] :0;
$sql_select = "SELECT * FROM admin WHERE id = ? AND password = ?";
$result = $connexion->prepare($sql_select);
$result->bind_param('ss',$id, $password);
$result->execute();
$result_set = $result->get_result();



if($result_set->num_rows> 0){
    echo 'connected';
    $take_info = $result_set->fetch_assoc();
    $_SESSION['idAdmin'] = $take_info['id'];
    $_SESSION['idPass'] = $take_info['password'];
    header('Location:admin.php');
}else{
    header('Location:login.php');
    $_SESSION['alerte'] = 'Les informations entrèes sont incorrect';
};
$result->close();
?>