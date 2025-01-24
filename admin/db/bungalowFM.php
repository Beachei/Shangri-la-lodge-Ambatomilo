<?php
require './config/config.php';

$conn = new mysqli($server, $name, $pwd, $dbname);
if ($conn->connect_error) { 
    die(''. $conn->connect_error);
};
$sql = "SELECT * FROM bungalow_familiale";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$nombreDeligne = $result->num_rows;

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
<div class="FMA offset-1 col-3 border radius">
<div><h2 class="text-center th mb-0 radius-top1">BUNGALOW FAMILIALE</h2></div>
<div><img width="100%" height="100%" src="./asset/image/Bungalow.jpg" alt=""></div>
<div class="d-flex justify-content-center py-3 align-items-center"><h5 class="mb-0">Place occupé : </h5><h5 class="ms-2 nombreFM fmcolor mb-0"><?php echo $nombreDeligne; ?></h5><h5 class="ms-2 mb-0 fmcolor">/ 4</h5><button class="fw-bold btn ms-3 btnFm">➕</button></div>
</div>
<div class="fmTableau col-8">
    <button class="retour btn fw-bold">retour</button>
    <table class="mt-2 col-10">
        <tr>
            <th class="th" colspan="6">les clients assigné au bungalow familiale</th>
        </tr>
        <tr>
            <th>Id</th>
            <th>Id du client</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Bungalow</th>
            <th>N° de bungalow</th>
        </tr>
        <?php
        if($nombreDeligne >0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>". $row["id"] ."</td>";
                echo "<td>". $row["id_acheteur"] ."</td>";
                echo "<td>". $row["nom"] ."</td>";
                echo "<td>". $row["prenom"] ."</td>";
                echo "<td>". $row["bungalow"] ."</td>";
                echo "<td>". $row["rom_id"] ."</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>
</body>
</html>
<script>
    $('document').ready(function(){
        $('.fmTableau').hide();
        $('.btnFm').click(function(){
            $('.FMA').hide('slow');
            $('.DBA').hide('slow');
            $('.fmTableau').show('slow');
        })
    })
</script>
