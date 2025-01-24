<?php 

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="d-flex">
                <select name="selection" class="bungalow ms-1">
                    <option class="BGD" value="BUNGALOW DOUBLE">BUNGALOW DOUBLE</option>
                    <option class="BGF" value="BUNGALOW FAMILIALE">BUNGALOW FAMILIALE</option>
                </select>
                <div class="d-flex">
                <p class="mb-0">Numero de chambre :</p>
                  <select name='room_id' class='room_id ms-1' require>
                      <option value=''></option>
                       <?php 
                             if($result->num_rows>0){
                             while($row = $result->fetch_assoc()){
                             $rom = $row["rom_id"];
                             $stats = $row["status"];
                             $bungalow = $row["bungalow"];
                             echo "<option class='option$rom opt' value='$rom' stat='$stats' bungalow='$bungalow'>".$rom."</option>";
                            }
                             }
                      ?>
                  </select>
                </div>
                <button class="btnBungalow fw-bold border-1 radius ms-1" type="button">assigné</button>
</div>
</body>
</html>
<script>
$(document).ready(function(){
    console.log($('.room_id').val() +" "+"Room ID")
        $('.room_id').change(function(){
            console.log($('.room_id').val())
        })
        $('.opt[bungalow="BD"]').each(function(id,element){
            $(element).addClass('BD')
        })
        $('.opt[bungalow="BF"]').each(function(id,element){
            $(element).addClass('BF')
        })
        $('.opt[stat="libre"]').each(function(id,element){
            element.disabled = false
        })
        $('.opt[stat="prise"]').each(function(id,element){
           element.disabled = true
        })
})
</script>