<?php 
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') {
  http_response_code(403); // Requête interdite
  echo 'ACCESS LOCKED';
  exit;
}
header("Content-Type: text/event-stream");
header("Cache-Control: no-cache");
header("Connection: keep-alive");

require '../config/config.php';
$connexion = new mysqli($server,$name,$pwd,$dbname) ;
if($connexion->connect_error){
    die("". $connexion->connect_error);
};
$connexion->set_charset("utf8mb4");
$sql = "SELECT * FROM sejour_terminer ORDER BY id DESC"; 
$stmt = $connexion->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();


$data = [];

if($result->num_rows > 0) {
  $num = $result->num_rows;
  while($row = $result->fetch_assoc()) {
    $data[]= $row;

     }  
};



$stmt->close();
$connexion->close();
echo json_encode($data);


?>
