<?php 

$conn = new mysqli($server,$name,$pwd,$dbname);
if($conn->connect_error){
    die(''.$conn->connect_error);
}

$sql = "SELECT * FROM rom";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="d-flex col-12">
        <?php 
            if($result->num_rows>0){
             while($row = $result->fetch_assoc()){
              $rom = $row["rom_id"];
              $stats = $row["status"];
              echo "<div class='id col-1 align-self-center fw-bold'>".$rom."<input class='stat' type='hidden' value='$stats'>"."</div>";
             }
            }
        ?>
    </div>
</body>
</html>
<script>
$(document).ready(function(){
    $('.id').each(function(id, element){
        console.log($(element).attr('attribut'))
    })
    $('.stat').each(function(id, element){
        const romColor = $(element).closest('.id')
        if($(element).val() != "libre" ){
        console.log("prise")
        romColor.css('color','#f23f3a')
        }else{
        console.log("libre")
        };   
    })

})
</script>