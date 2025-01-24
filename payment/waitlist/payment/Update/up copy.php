<?php 
$server = "31.11.39.170";
$name = "Sql1115253";
$pwd = "423358667o";
$dbname = "Sql1115253_2";

$token = isset($_POST['tokenid'])?$_POST['tokenid']:"";
$amount = floatval(isset($_POST['price'])?$_POST['price']:"");
$brut = floatval(isset($_POST['brut'])?$_POST['brut']:"");
$frai = floatval(isset($_POST['frai'])?$_POST['frai']:"");
$priceT = floatval(isset($_POST["priceTraitement"])?$_POST["priceTraitement"]:"");
$priceA = floatval(isset($_POST["priceAdulte"])?$_POST["priceAdulte"]:"");
$priceE = floatval(isset($_POST["priceEnfant"])?$_POST["priceEnfant"]:"");
$priceAE = floatval(isset($_POST["totalAE"])?$_POST["totalAE"]:"");
$selection = isset($_POST['selection'])?$_POST['selection']:"";
$arrive = isset($_POST['dateArrive'])? $_POST['dateArrive'] : "";
$depart = isset($_POST['dateDepart'])? $_POST['dateDepart'] : "";
$durée = isset($_POST['dure'])? $_POST['dure'] : "";
$adulte = intval(isset($_POST['nbrA'])? $_POST['nbrA'] : "");
$enfant = intval(isset($_POST['nbrE'])? $_POST['nbrE'] : "");
$personnes = intval($adulte) + intval($enfant);
$description = "";
$prixTotale = $amount;
$prixTotale1 = isset($_POST['prixTotale'])? $_POST['prixTotale']:"450";
$nom = strtoupper($nom);
$prenom = ucwords($prenom);
$mail = strtolower($mail);
switch($selection){
    case 1 :
        $description = "BED & BREAKFAST";
        break;
    case 2 : 
        $description = "DEMI PENSION";
        break;
    case 3 :
        $description = "PENSION COMPLET";
        break;
}
$allActivite = $activité;
$allActivite = json_encode($allActivite,JSON_UNESCAPED_UNICODE);


$conn = new mysqli($server,$name,$pwd,$dbname);
if($conn->connect_error){
    die(''.$conn->connect_error);
}
 
$sql = "UPDATE `enattente` SET `traitement`=? WHERE `token`=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss',$description,$token);
$result = $stmt->execute();
if ($stmt->affected_rows > 0) {
    echo "Mise à jour réussie.";
} else {
    echo "Aucune mise à jour effectuée.$token";
}

$stmt->close();
$conn->close();
?>