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
$arrive = isset($_POST['arrive'])? $_POST['arrive'] : "";
$depart = isset($_POST['depart'])? $_POST['depart'] : "";
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
 
//$sql = "UPDATE `enattente` SET `traitement` = ?, `nombre_de_personnes` = ?, `nombre_d'adulte` = ?, `nombre_d'enfant` = ?, `nombre_de_séjour` = ?, `date_d'arrivé` = ?, `date_de_départ` = ?, `prixAE` = ?, `prix_adulte` = ?, `prix_enfant` = ?, `prix_du_traitement` = ?, `total_sf` = ?, `frai_paypal` = ?, `prix_totale` = ?, `prix_totale1` = ? WHERE token = ?";
$sql = "UPDATE enattente SET `traitement`=?, `nombre_de_personnes`=?, `nombre_d'adulte`=?, `nombre_d'enfant`=?,`nombre_de_séjour`=?,`date_d'arrivé`=?, `date_de_départ`=?, `prixAE`=?, `prix_adulte`=?, `prix_enfant`=?, `prix_du_traitement`=?, `total_sf`=?, `frai_paypal`=?, `prix_totale`=?, `prix_totale1`=? WHERE token=?";
$stmt = $conn->prepare($sql);
// $stmt->bind_param('siiiissdddddddds',$description,$personnes,$adulte,$enfant,$durée,$arrive,$depart,$priceAE,$priceA,$priceE,$priceT,$brut,$frai,$prixTotale,$prixTotale1,$token);
$stmt->bind_param('siiiissdddddddds',$description,$personnes,$adulte,$enfant,$durée,$arrive,$depart,$priceAE,$priceA,$priceE,$priceT,$brut,$frai,$prixTotale,$prixTotale1,$token);
$result = $stmt->execute();
if($stmt->affected_rows>0){
    echo "Mise à jour effectuer";
}else{
    echo "Riens et mise à jour.$token. .description.$description. .$selection";
}

$stmt->close();
$conn->close();
?>