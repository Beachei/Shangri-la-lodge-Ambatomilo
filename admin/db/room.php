<?php 
require "../config/config.php";

$conn = new mysqli($server,$name,$pwd,$dbname);
if($conn->connect_error){
    die(''.$conn->connect_error);
}

$sql = "SELECT * FROM rom";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$conn->close();
?>
<?php 

if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        echo $row["rom_id"]." ".$row["status"]."<br>";
    }
}
?>
